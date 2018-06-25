<?php

namespace PIS\Http\Controllers\Auth;

use Illuminate\Support\Facades\Redirect;
use PIS\Personal_Information;
use PIS\User;
use PIS\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use PIS\User_dtr;
use PIS\User_dts;
use PIS\Work_Experience;
use PIS\SalaryGrade;
use PIS\Division;
use PIS\Section;
use PIS\Designation;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


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
        //$this->middleware('guest');
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function new_employee(Request $request){
        if ($request->isMethod('GET'))
        {
            $designation = Designation::get();
            $division = Division::get();
            $section = Section::get();
            return view('auth.new_employee',[
                "designation" => $designation,
                "division" => $division,
                "section" => $section,
            ]);
        }
    }

    public function register(Request $request){
        $rules = [
            'captcha' => 'required|captcha',
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'date_of_birth' => 'required|date',
            'email_address' => 'required|email',
            'designation_id' => 'required',
            'division_id' => 'required',
            'section_id' => 'required',
        ];
        $message = [
            'captcha' => 'Invalid Captcha',
            'designation_id.required' => 'The designation field is required.',
            'division_id.required' => 'The division field is required.',
            'section_id.required' => 'The section field is required.',
        ];
        $validator = Validator::make($request->all(),$rules,$message);
        if ($validator->fails()) {
            $data = $request->all();
            unset($data['_token']);
            return Redirect::back()
                ->withErrors($validator)
                ->withInput()
                ->with($data);
        } else {
            $data[] = $request->all();
            unset($data[0]['_token']);
            unset($data[0]['captcha']);
            Personal_Information::insert($data);
            return redirect('/')->with('addEmployee','Your are successfully saved to our database, Please wait the message to your email as your field(s) is/are still subject for validation. Thank you!');
        }

    }

    public function addUserid(Request $request){
        $previousId = $request->get('previousId');
        $currentId = $request->get('currentId');

        $personal_information = Personal_Information::where('userid','=',$previousId)->first();
        $work_experience = Work_Experience::where('userid','=',$previousId)->first();
        $record = $personal_information;

        $record->fname == '' ? $fnameFinal = "" : $fnameFinal = $record->fname;
        $record->mname == '' ? $mnameFinal = "" : $mnameFinal = $record->mname;
        $record->lname == '' ? $lnameFinal = "" : $lnameFinal = $record->lname;
        is_null($record->designation) ? $designationFinal = 0 : $designationFinal = (int)$record->designation_id;
        is_null($record->division) == '' ? $divisionFinal = 0 : $divisionFinal = (int)$record->division_id;
        is_null($record->section) == '' ? $sectionFinal = 0 : $sectionFinal = (int)$record->section_id;

        User_dts::insertIgnore([
            "fname" => $fnameFinal,
            "mname" => $mnameFinal,
            "lname" => $lnameFinal,
            "username" => $currentId,
            "password" => bcrypt($currentId),
            "designation" => $designationFinal,
            "division" => $divisionFinal,
            "section" => $sectionFinal,
            "user_priv" => 0,
            "status" => 0
        ]);

        User::insertIgnore([
            'username' => $currentId,
            'password' => bcrypt($currentId),
            'usertype' => '0',
            'user_status' => "1",
            'pin' => 1234
        ]);

        User_dtr::insertIgnore([
            "userid" => $currentId,
            "fname" => $fnameFinal,
            "mname" => $mnameFinal,
            "lname" => $lnameFinal,
            "sched" => "1",
            'username' => $currentId,
            'password' => bcrypt($currentId),
            'emptype' => 'JO',
            'usertype' => '0',
            'unique_row' => $currentId,
        ]);

        if($personal_information){
            $personal_information->update([
                "userid" => $currentId
            ]);
        }
        if($work_experience){
            $work_experience->update([
                "userid" => $currentId
            ]);
        }

        return Redirect::back()->with('addUserid', 'Successfully Inserted Employee ID');
    }


}
