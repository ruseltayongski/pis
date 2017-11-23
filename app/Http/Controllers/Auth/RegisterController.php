<?php

namespace PIS\Http\Controllers\Auth;

use Illuminate\Support\Facades\Redirect;
use PIS\Personal_Information;
use PIS\User;
use PIS\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use PIS\User_dts;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \PIS\User
     */
    protected function create(array $data)
    {
        //way gamit
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request){
        User_dts::insertIgnore([
            'username' => $request->get('userid'),
            'password' => bcrypt($request->get('userid')),
            'designation' => $request->get('designation'),
            'division' => $request->get('division'),
            'section' => $request->get('section'),
            'fname' => $request->get('fname'),
            'mname' => $request->get('mname'),
            'lname' => $request->get('lname'),
            'user_priv' => 0,
            'status' => 0,
        ]);

        User::insertIgnore([
            'username' => $request->get('userid'),
            'password' => bcrypt($request->get('userid')),
            'usertype' => '0'
        ]);
        
        Personal_Information::insertIgnore([
            'userid' => $request->get('userid'),
            'designation_id' => $request->get('designation'),
            'division_id' => $request->get('division'),
            'section_id' => $request->get('section'),
            'fname' => $request->get('fname'),
            'mname' => $request->get('mname'),
            'lname' => $request->get('lname'),
            'residential_address' => $request->get('address'),
            'blood_type' => $request->get('blood_type'),
            'height' => $request->get('height'),
            'weight' => $request->get('weight'),
            'tin_no' => $request->get('tin_no'),
            'gsis_polno' => $request->get('gsis_polno'),
            'gsis_idno' => $request->get('gsis_idno'),
            'phicno' => $request->get('phicno'),
            'date_of_birth' => $request->get('date_of_birth'),
            'email_address' => $request->get('email'),
            'case_name' => $request->get('case_name'),
            'case_address' => $request->get('case_address'),
            'case_contact' => $request->get('case_contact'),
            'remarks' => 'PIS',
        ]);

        return Redirect::back();

    }

}
