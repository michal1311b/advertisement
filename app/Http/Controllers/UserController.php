<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Advertisement;
use App\CompanyCourse;
use Auth;
use Image;
use Illuminate\Support\Facades\Hash;
use App\Notifications\UserFollowed;
use App\Specialization;
use App\Experience;
use App\Http\Requests\User\UploadRequest;
use App\Language;
use App\Location;
use App\UserLanguage;
use App\LocationUser;
use App\Work;
use App\Settlement;
use App\Currency;
use App\ForeignOffer;
use App\State;
use App\UserAdvertisement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class UserController extends Controller
{
    public function edit(User $user)
    {
        $editUser = Auth::user()
        ->load([
            'doctor', 
            'nurse', 
            'profile', 
            'finishedSpecializations', 
            'pendingSpecializations', 
            'experiences', 
            'courses', 
            'preference'
        ]);

        $user = Auth::user();
        $user->checkAuthorization($editUser->id, $user->id);
        
        if($user->hasRole('nurse')) {
            $specializations = Specialization::whereIn('type', [0, 3])->get();
        } else {
            $specializations = Specialization::whereIn('type', [0, 1, 2])->get();
        }
        
        $languages = Language::all();
        $userLanguages = UserLanguage::where('user_id', $editUser->id)->with('language')->get();
        $userLocations = LocationUser::where('user_id', $editUser->id)->with('location')->get();
        $locations = Location::get(['id', 'city']);
        $works = Work::get(['id', 'name']);
        $settlements = Settlement::get(['id', 'name']);
        $currencies = Currency::get(['id', 'name', 'symbol']);
        $distances = [
            ['label' => '+0 km', 'value' => 0],
            ['label' => '+10 km', 'value' => 10],
            ['label' => '+20 km', 'value' => 20],
            ['label' => '+50 km', 'value' => 50],
            ['label' => '+100 km', 'value' => 100],
            ['label' => '+150 km', 'value' => 150],
            ['label' => 'Cała Polska', 'value' => 1000],
        ];

        return view('user.edit', compact([
            'editUser',
            'specializations',
            'languages',
            'userLanguages',
            'userLocations',
            'works',
            'settlements',
            'currencies',
            'locations',
            'distances'
        ]));
    }

    public function update(UploadRequest $request, User $user)
    {
        if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
    		
    		$user->avatar = '/uploads/avatars/' . $filename;
        }

        if($user->doctor !== null)
        {
            $doctor = $user->doctor()->first();
            $doctor->sex = $request->sex;
            $doctor->save();
        }

        if($user->nurse !== null)
        {
            $nurse = $user->nurse()->first();
            $nurse->sex = $request->sex;
            $nurse->save();
        }

        $user->name = $request->name;
        $user->password = ($request->password === null) ? $user->password : Hash::make($request->password);
        $user->save();
        $profile = $user->profile()->get();
        $profile[0]->update($request->all());

        $specializations = $request->input('specializations') ?? [];
        $pending_specializations = $request->input('specializationsp') ?? [];

        if($pending_specializations && count($pending_specializations))
        {
            array_merge($specializations, $pending_specializations);

            foreach ($pending_specializations as $specialization) {
                $specializations[$specialization] = ['is_pending' => true];
            }
        }

        //user is update by patch method
        //sometimes there are no specializations or pending specializations input
        //we don't want to erase user specializations in that case
        if($specializations)
        {
            $user->specializations()->sync($specializations);
        }

        session()->flash('success',  trans('crudInfos.profile-update-success'));

        return back();
    }

    public function getUserAdvertisements()
    {
        $user = Auth::user();
        $advertisements = Advertisement::with(['state', 'galleries', 'visits'])
        ->withCount('likes')
        ->where('user_id', '=', $user->id)
        ->paginate(5);

        $date = Carbon::now();
        
        return view('user.advertisements', compact([
            'advertisements',
            'date'
        ]));
    }

    public function showUserAdvertisement(Advertisement $advertisement, $slug)
    {
        $user = Auth::user();
        $advertisement = Advertisement::whereSlug($slug)
        ->where('user_id', '=', $user->id)
        ->firstOrFail();

        $data = UserAdvertisement::where('advertisement_id', $advertisement->id)
        ->pluck('user_id')->toArray();

        $candidates = User::whereIn('id', $data)
        ->with([
            'profile',
            'specializations',
            'courses' => function($query) {
                $query->orderBy('end_date', 'desc');
            },
            'experiences' => function($query) {
                $query->orderBy('end_date', 'desc');
            },
            'doctor' => function($query) {
                $query->whereNotNull('cv');
                $query->where('share', 1);
            },
            'nurse' => function($query) {
                $query->whereNotNull('cv');
                $query->where('share', 1);
            }
        ])->paginate(5);
        
        return view('user.advertisement-show', compact([
            'advertisement',
            'candidates'
        ]));
    }

    public function follow(User $user)
    {
        $follower = auth()->user();
        if ($follower->id == $user->id) {
            return back()->withError("You can't follow yourself");
        }
        if(!$follower->isFollowing($user->id)) {
            $follower->follow($user->id);

            // sending a notification
            $user->notify(new UserFollowed($follower));

            return back()->withSuccess("You are now friends with {$user->name}");
        }
        return back()->withError("You are already following {$user->name}");
    }

    public function unfollow(User $user)
    {
        $follower = auth()->user();
        if($follower->isFollowing($user->id)) {
            $follower->unfollow($user->id);
            return back()->withSuccess("You are no longer friends with {$user->name}");
        }
        return back()->withError("You are not following {$user->name}");
    }
    
    public function notifications()
    {
        return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();
    }

    public function read(Request $request)
    {
        if($request->has('read')) {
            $notification = $request->user()->notifications()->where('id', $request->read)->first();
            if($notification) {
                $notification->markAsRead();
            }
        }

        return back();
    }

    public function createSimilarOffer(Advertisement $advertisement)
    {
        if($advertisement->user_id !== Auth::user()->id) {
            return back();
        }

        $works = Work::all();
        $states = State::all();
        $locations = Location::get(['id', 'city']);
        $specializations = Specialization::all();
        $currencies = Currency::all();
        $settlements = Settlement::all();

        $tags_array = [];
        foreach ($advertisement->tags as $tag) {
            $tags_array[] = $tag->name;
        }

        $tags = implode(",", $tags_array);

        return view('advertisement.similar',  compact([
            'advertisement', 
            'works', 
            'states', 
            'tags', 
            'locations', 
            'specializations', 
            'currencies', 
            'settlements'
        ]));
    }

    public function getUserCourses()
    {
        $user = Auth::user();
        $courses = CompanyCourse::with([
            'state',
            'location',
            'specialization',
            'user',
            'currency'
        ])
        ->where('user_id', $user->id)
        ->paginate(5);

        return view('user.courses', compact('courses'));
    }

    public function getUserForeigns()
    {
        $user = Auth::user();
        $foreigns = ForeignOffer::where('user_id', '=', $user->id)
        ->withCount('foreign_visits')
        ->withCount('likes')
        ->paginate(5);
        $date = Carbon::now();

        return view('user.foreigns', compact(['foreigns', 'date']));
    }

    public function createSimilarForeign($id)
    {
        $foreign = ForeignOffer::find($id);
        if($foreign->user_id !== Auth::user()->id) {
            return back();
        }

        $works = Work::all();
        $specializations = Specialization::all();
        $currencies = Currency::all();
        $settlements = Settlement::all();

        return view('foreign.similar',  compact([
            'foreign', 
            'works', 
            'specializations', 
            'currencies', 
            'settlements'
        ]));
    }
}
