<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Doctor;
use App\Profile;
use App\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Location;
use App\Preference;
use App\Specialization;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $specializations = Specialization::all();

        return view('auth.register', compact('specializations'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    public function validateNil($pwz, $dob)
    {
        $resp = json_decode(file_get_contents('https://nil.lptgroup.pl/validate/' . $pwz . '/' . str_replace("-", "", $dob)));
        return $resp->status == '1';
    }

    protected function CheckNIP($str) {
        $str = preg_replace('/[^0-9]+/', '', $str);
     
        if (strlen($str) !== 10) {
            return false;
        }
     
        $arrSteps = array(6, 5, 7, 2, 3, 4, 5, 6, 7);
        $intSum = 0;
     
        for ($i = 0; $i < 9; $i++) {
            $intSum += $arrSteps[$i] * $str[$i];
        }
     
        $int = $intSum % 11;
        $intControlNr = $int === 10 ? 0 : $int;
     
        if ($intControlNr == $str[9]) {
            return true;
        }
     
        return false;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        DB::beginTransaction();

        try {
            if($request->type === 'doctor')
            {
                if(!$this->validateNil($request->pwz, $request->birthday))
                {
                    return back()->withErrors([
                        'message' => trans('sentence.nil-validation-faild')
                    ])->withInput($request->all());
                }

                if(!isset($request->specializations) && !isset($request->specializationsp))
                {
                    return back()->withErrors([
                        'message' => trans('sentence.one-specialization-at-least')
                    ])->withInput($request->all());
                }

                event(new Registered($user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'avatar' => '/images'. '/' .  $request->sex . '.png',
                    'term1' => $request->term1,
                    'term2' => $request->term2,
                    'term3' => $request->term3
                ])));

                $doctor = Doctor::create([
                    'user_id' => $user->id,
                    'pwz' => $request->pwz,
                    'sex' => $request->sex,
                    'birthday' => $request->birthday
                ]);

                if(isset($request->specializations))
                {
                    $user->specializations()->attach($request->get('specializations'));
                }
                
                if(isset($request->specializationsp))
                {
                    $user->specializations()->attach($request->get('specializationsp'), [
                        'is_pending' => 1
                    ]);
                }

                $profile = Profile::create([
                    'user_id' => $user->id
                ]);

                $preference = Preference::create([
                    'user_id' => $user->id
                ]);
            } else {
                $latLong = $this->get_lat_long($request->company_street, $request->company_city);
                // Log::info($latLong);

                if(!$this->CheckNIP($request->get('company_nip')))
                {
                    session()->flash('error',  trans('sentence.invalid-nip'));
                    return back()->withInput($request->all());
                }

                event(new Registered($user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'avatar' => '/images/chicken-at-facebook.jpg',
                    'term1' => $request->term1,
                    'term2' => $request->term2,
                    'term3' => $request->term3
                ])));

                $profile = Profile::create([
                    'user_id' => $user->id,
                    'street' => $request->street,
                    'post_code' => $request->post_code,
                    'city' => $request->city,
                    'last_name' => $request->last_name,
                    'company_name' => $request->company_name,
                    'company_street' => $request->company_street,
                    'company_post_code' => $request->company_post_code,
                    'company_city' => $request->company_city,
                    'company_nip' => $request->company_nip
                ]);
            }

            $user
                ->roles()
                ->attach(Role::where('name', $request->type)->first());

            DB::commit();

            session()->flash('success', 'You account was created. Please verify your email.');

            return back();
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('error',  trans('sentence.error-message'));

            return back()->withInput($request->all());
        }
    }

    protected function get_lat_long($address, $city){
        $location = Location::where('city', $city)->count();
        
        if($location === 0) {
            Log::info(33);
            $opts = array(
                'http' => array(
                    'header' => "User-Agent: StevesCleverAddressScript 3.7.6\r\n"
            ));

            $context = stream_context_create($opts);
            $address = str_replace(" ", "+", $address);
            $json = file_get_contents("https://nominatim.openstreetmap.org/search?q=$address,+$city&format=json&polygon=1&addressdetails=1", false, $context);
            
            $json = json_decode($json);
            $data = get_object_vars($json[0]);

            $lat = $data['lat'];
            $long = $data['lon'];
            
            Location::create([
                'city' => ucfirst($city),
                'longitude' => $long,
                'latitude' => $lat
            ]);

            return $lat.','.$long;
        } 
    }
}
