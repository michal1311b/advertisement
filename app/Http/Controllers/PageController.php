<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use App\Page;
use App\Profile;
use App\User;
use Carbon\Carbon;
use App\Http\Requests\Admin\Page\StoreRequest;
use App\Http\Requests\Admin\Page\UploadRequest;
use App\Role;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function siteIndex()
    {
        $advertisements = Advertisement::select(
            'id',
            'slug',
            'title', 
            'description', 
            'min_salary', 
            'max_salary', 
            'location_id',
            'settlement_id',
            'specialization_id',
            'currency_id',
            'state_id',
            'user_id',
            'expired_at'
            )
        ->with([
            'state' => function($query){
                $query->select('id', 'name');
            }, 
            'settlement' => function($query){
                $query->select('id', 'name');
            }, 
            'galleries',  
            'location' => function($query){
                $query->select('id', 'city');
            }, 
            'specialization' => function($query){
                $query->select('id', 'name');
            },
            'currency' => function($query){
                $query->select('id', 'symbol');
            },
            'user' => function($query){
                $query->with('profile');
            }])
        ->where('expired_at', '>', Carbon::now())
        ->orderBy('id', 'desc')->take(5)->get();

        $companies = User::has('advertisements', '>' , 0)
        ->withCount('advertisements')
        ->orderBy('advertisements_count')
        ->get(['id', 'avatar']);

        return view('welcome', compact(['advertisements', 'companies']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.index',[
            'pages' => Page::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $page = Page::create($request->all());

            DB::commit();

            session()->flash('success', trans('sentence.page-create-success'));

            return back();
        } catch(\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('error',  trans('sentence.error-message'));

            return back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function siteShow($slug)
    {
        $page = Page::whereSlug($slug)
        ->firstOrFail();

        return view('page.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit',[
            'page' => $page
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Page $page, UploadRequest $request)
    {
        DB::beginTransaction();

        try {
            $page->update($request->all());

            DB::commit();

            session()->flash('success', trans('sentence.page-update-success'));

            return back();
        } catch(\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('error',  trans('sentence.error-message'));

            return back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
       
        if ($page->delete()) {
            $message = ['message.success' => trans('sentence.delete-page')];
        }

        return redirect()->route('pages.index')->with($message);
    }

    public function cookies()
    {
        return view('cookies');
    }

    public function showRegulation()
    {
        return view('regulation');
    }

    public function showAverageSalary()
    {
        $avgs = Advertisement::select(
            DB::raw('avg(max_salary) as avg_max'),
            DB::raw('avg(min_salary) as avg_min'), 
            'currency_id', 
            'specialization_id',
            'work_id',
            'state_id')
            ->with(['currency', 'specialization', 'state'])
            ->groupBy('currency_id')
            ->groupBy('specialization_id')
            ->groupBy('state_id')
            ->groupBy('work_id')
            ->orderBy('specialization_id')
            ->orderBy('state_id')
            ->orderBy('work_id')
            ->get();
        
        return view('page.stats', compact('avgs'));
    }
}
