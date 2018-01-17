<?php

namespace PIS\Http\Controllers\Auth;

use PIS\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use PIS\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        //$this->middleware('guest');
    }


    public function change_password() {
        return view('auth.passwords.reset');
    }
    public function save_changes(Request $request){
        $validator = Validator::make(
            array(
                'current_password' => $request->input('current_password'),
                'password' => $request->input('password'),
                'password_confirmation' => $request->input('password_confirmation')
            ),
            array(
                'current_password' => 'required',
                'password' => 'required|max:15',
                'password_confirmation' => 'same:password'
            )
        );
        if($validator->fails()){
            return redirect('/change/password')->with('error', $validator->messages());
        }
        $user = User::find($request->user()->id);
        if(Hash::check($request->input('current_password'),$user->password)){
            $user->password = Hash::make($request->input('password_confirmation'));
            $user->save();
            Session::flush();
            return redirect('/')->with('passwordChange', 'Password succesfully changed. Login now to your account.');
        }
        return redirect('/change/password')->with('not_match','Current password invalid');
    }

    public function change()
    {
        $user = User::find(418);

        $user->password = Hash::make('0137');
        $user->save();
        Session::flush();
        return "Reseted";

    }

}
