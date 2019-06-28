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
use Illuminate\Validation\Rule;
use PIS\WorkSched;
use Illuminate\Support\Facades\DB;


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
            $sched = WorkSched::all();
            $last_userid7 = Personal_Information::where('userid','REGEXP','^[0-9]+$')
                ->where(DB::raw("LENGTH(userid)"),'<=',4)
                ->where('userid','<=','1000')
                ->orderBy(DB::raw("CONVERT(SUBSTRING_INDEX(userid,'-',-1),UNSIGNED INTEGER)"),'desc')
                ->first()->userid+1;

            if($last_userid_temp8 = Personal_Information::
                where('region','=','region_8')
                ->orderBy('id','desc')
                ->first()){
                $last_userid8 = $last_userid_temp8->userid;
                $last_userid8++;
            } else{
                $last_userid8 = 1;
            }


            $designation = Designation::get();
            $division = Division::get();
            $section = Section::get();
            return view('auth.new_employee',[
                "designation" => $designation,
                "division" => $division,
                "section" => $section,
                "last_userid7" => $last_userid7,
                "last_userid8" => $last_userid8,
                "sched" => $sched
            ]);
        }
    }

    public function register(Request $request){
        $rules = [
            'captcha' => 'required|captcha',
            'userid' => 'required|unique:personal_information',
            'region' => 'required',
            'field_status' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'sched_id' => 'required',
            'designation_id' => 'required',
            'division_id' => 'required',
            'section_id' => 'required',
            'job_status' => 'required',
            'date_of_birth' => 'required_without',
            'blood_type' => 'required_without',
            'height' => 'required_without',
            'weight' => 'required_without',
            'tin_no' => 'required_without',
            'phic_no' => 'required_without',
            'gsid_pol' => 'required_without',
            'gsid_id' => 'required_without',
            'r_barangay' => 'required_without',
            'r_municipality' => 'required_without',
            'r_province' => 'required_without',
            'rhouse_no' => 'required_without',
            'r_street' => 'required_without',
            'r_subdivision' => 'required_without',
            'rzip_code' => 'required_without',
            'case_name' => 'required_without',
            'case_address' => 'required_without',
            'case_contact' => 'required_without',
        ];
        $message = [
            'captcha' => 'Invalid Captcha',
            'designation_id.required' => 'The designation field is required.',
            'division_id.required' => 'The division field is required.',
            'section_id.required' => 'The section field is required.',
            'sched_id.required' => 'The work schedule field is required.',
            'job_status.required' => 'The job status field is required.'
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
            if($request->job_status == 'Permanent'){
                $job_status = 'REG';
                $disbursement_type = "ATM";
            }
            else{
                $job_status = 'JO';
                $disbursement_type = "CASH_CARD";
            }
            //PIS
            $password = bcrypt('123');
            $personal_information = new Personal_Information();
            $personal_information->userid = $request->userid;
            $personal_information->fname = $request->fname;
            $personal_information->mname = $request->mname;
            $personal_information->lname = $request->lname;
            $personal_information->sched = $request->sched_id;
            $personal_information->designation_id = $request->designation_id;
            $personal_information->division_id = $request->division_id;
            $personal_information->section_id = $request->section_id;
            $personal_information->job_status = $request->job_status;
            $personal_information->date_of_birth = $request->date_of_birth;
            $personal_information->blood_type = $request->blood_type;
            $personal_information->height = $request->height;
            $personal_information->weight = $request->weight;
            $personal_information->tin_no = $request->tin_no;
            $personal_information->phicno = $request->phicno;
            $personal_information->gsis_polno = $request->gsid_pol;
            $personal_information->gsis_idno = $request->gsis_idno;
            $personal_information->RBarangay = $request->r_barangay;
            $personal_information->RMunicipality = $request->r_municipality;
            $personal_information->RProvince = $request->r_province;
            $personal_information->RHouseNo = $request->rhouse_no;
            $personal_information->RStreet = $request->r_street;
            $personal_information->RSubdivision = $request->r_subdivision;
            $personal_information->RZip_code = $request->rzip_code;
            $personal_information->case_name = $request->case_name;
            $personal_information->case_address = $request->case_address;
            $personal_information->case_contact = $request->case_contact;
            $personal_information->disbursement_type = $disbursement_type;
            $personal_information->employee_status = 'Active';
            $personal_information->user_status = '1';
            $personal_information->region = $request->region;
            $personal_information->field_status = $request->field_status;
            $personal_information->save();

            User::insertIgnore([
                "username" => $request->userid,
                "password" => $password,
                "usertype" => 0,
                "pin" => 1234,
            ]);

            User_dts::insertIgnore([
                "fname" => $request->fname,
                "mname" => $request->mname,
                "lname" => $request->lname,
                "username" => $request->userid,
                "password" => $password,
                "designation" => $request->designation_id,
                "division" => $request->division_id,
                "section" => $request->section_id,
                "user_priv" => 0,
                "status" => 0
            ]);

            User_dtr::insertIgnore([
                "region" => $request->region,
                "field_status" => $request->field_status,
                "userid" => $request->userid,
                "fname" => $request->fname,
                "mname" => $request->mname,
                "lname" => $request->lname,
                "sched" => $request->sched_id,
                'username' => $request->userid,
                'password' => $password,
                'emptype' => $job_status,
                'usertype' => '0',
                'unique_row' => $request->userid,
            ]);

            return redirect('/')->with('addEmployee','You are successfully registered. Thank you!');
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
