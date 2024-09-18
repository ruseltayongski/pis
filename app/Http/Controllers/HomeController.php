<?php

namespace PIS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PIS\Designation;
use PIS\Division;
use PIS\Personal_Information;
use PIS\Section;
use PIS\User_dts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PIS\User;
use Illuminate\Support\Facades\Hash;
use PIS\SalaryGrade;
use PIS\Survey;
use PIS\Training_Program;
use PIS\User_dtr;
use PIS\Voluntary_Work;
use PIS\Work_Experience;
use PIS\Other_Information;
use PIS\EmployeeStatus;
use PIS\Children;
use PIS\Civil_Eligibility;
use PIS\Educational_Background;
use PIS\EducationType;
use PIS\Family_Background;
use App\Helpers\JwtHelper;
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;
use Defuse\Crypto\Exception\EnvironmentIsBrokenException;
use Defuse\Crypto\Exception\WrongKeyOrModifiedCiphertextException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Exception;
use Illuminate\Support\Facades\Http; 

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function jwt(Request $request) {
        $userid = $request->query('userid');
        $token = Session::put('token', $userid);
        if (!$userid) {
            return response()->json(['error' => 'User ID is required'], 400);
        }
        $userid=urlencode($userid);
        $message = $this->test($userid);
        if ($message instanceof \Illuminate\Http\RedirectResponse) {
            return $message;
        }
    }
    
    public function flushSessionDts(Request $request){
        $token = Session::get('token');
        $system = $request->query('system'); // Get the 'system' value from query parameter
        Session::flush(); // Clear all session data
    
        $redirectUrl = '';
    
        // Handle different system cases
        switch ($system) {
            case 'dts':
                $redirectUrl = 'https://mis.cvchd7.com/dts/login_jwt?userid='.urlencode($token);
                break;
            case 'payroll':
                $redirectUrl = 'http://192.168.110.43:8083/Account/Login_Jwt?userid='.urlencode($token);
                break;
            // Add more cases as needed
            default:
                $redirectUrl = 'https://pis.cvchd7.com/default/login_jwt?userid='.urlencode($token);
                break;
        }
    
        return redirect()->away($redirectUrl);
        // return redirect()->away('https://mis.cvchd7.com/dts/login_jwt?userid='.urlencode($token));
    }

    public function test($userid) {
        $key = 'D65459959AAEF56E'; // Adjust to match your actual 

        if(empty($userid)){
            echo "nothing";
        }
        
        // dd(urlencode($userid));
        try {
            // Attempt AES-128-CBC decryption
            $decrypted = $this->aes_decrypt($userid, $key, 'AES-128-CBC');
            if ($decrypted === false) {
                throw new Exception('AES-128-CBC decryption failed');
            }
            // echo 'AES-128-CBC decryption successful: ' . $decrypted . PHP_EOL;
            $user = User::where('username',"=", $decrypted)->first();
        } catch (Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }
       
        Auth::login($user);
        if (Auth::check()) {
            if(Auth::user()->usertype) {
                return redirect::to('/excel');
            }
            else {
               return redirect::to('/pisProfile');
            }
        } else {
            return 'Authentication failed. Debugging:'. $user->username. $user->password;
        }
    }

    private function aes_decrypt($encrypted, $key, $cipherMethod) {
        // Base64 decode the encrypted data
        $decoded = urldecode($encrypted);

        // Base64 decode the URL-decoded data
        $data = base64_decode($decoded);

        // Extract the IV from the decoded data (assuming the first 16 bytes are the IV)
        $iv = substr($data, 0, 16);

        // Extract the encrypted data (assuming the rest is the encrypted payload)
        $encryptedData = substr($data, 16);

        // Perform the decryption
        $decrypted = openssl_decrypt($encryptedData, $cipherMethod, $key, OPENSSL_RAW_DATA, $iv);

        // $data = base64_decode($encrypted);

        // // Extract the IV from the encrypted data (assuming the first 16 bytes are the IV)
        // $iv = substr($data, 0, 16);

        // // Extract the encrypted data (assuming the rest is the encrypted payload)
        // $encryptedData = substr($data, 16);

        // // Perform the decryption
        // $decrypted = openssl_decrypt($encryptedData, $cipherMethod, $key, OPENSSL_RAW_DATA, $iv);

        return $decrypted;
    }
    
    public function login()
    {
        $designation = Designation::get();
        $division = Division::get();
        $section = Section::get();   

        if(Auth::check()){
            return Redirect::to('excel');
        } else {
            return view('auth.login',[
                "designation" => $designation,
                "division" => $division,
                "section" => $section,
            ]);
        }
    }

    public function userid_trapping(Request $request){
        return Personal_Information::where('userid', '=', $request->get('userid'))->first();
    }

    public function filterEmployee($job_status,$gender){
        $user = Personal_Information::
                                    select(
                                        'personal_information.userid',
                                        \DB::raw("upper(concat(personal_information.fname,' ',personal_information.lname)) as name"),
                                        'des.description as designation',
                                        'sec.description as section',
                                        'div.description as division',
                                        'personal_information.sex',
                                        'personal_information.job_status',
                                        'em.description as employee_status_value',
                                        'em.id as employee_status_id'
                                    )
                                    ->leftJoin('employee_status as em','em.id','=','personal_information.employee_status')
                                    ->leftJoin('dts.designation as des','des.id','=','personal_information.designation_id')
                                    ->leftJoin('dts.section as sec','sec.id','=','personal_information.section_id')
                                    ->leftJoin('dts.division as div','div.id','=','sec.division')
                                    ->where('personal_information.job_status','=',$job_status)
                                    ->where('personal_information.sex','=',$gender)
                                    ->paginate('10');

        return view('filter.filter',[
            "user" => $user,
            'title1' => $job_status,
            'title2' => $gender
        ]);
    }

    public function activeAndResigned($employee_status){
        $user = Personal_Information::
                select(
                    'personal_information.userid',
                    \DB::raw("upper(concat(personal_information.fname,' ',personal_information.lname)) as name"),
                    'des.description as designation',
                    'sec.description as section',
                    'div.description as division',
                    'personal_information.sex',
                    'personal_information.job_status',
                    'personal_information.resigned_effectivity',
                    'em.description as employee_status_value',
                    'em.id as employee_status_id'
                )
                    ->leftJoin('employee_status as em','em.id','=','personal_information.employee_status')
                    ->leftJoin('dts.designation as des','des.id','=','personal_information.designation_id')
                    ->leftJoin('dts.section as sec','sec.id','=','personal_information.section_id')
                    ->leftJoin('dts.division as div','div.id','=','sec.division')
                    ->where('personal_information.employee_status','=',$employee_status)
                    ->paginate('10');

        return view('filter.filter',[
            "user" => $user,
            'title1' => $user[0]->employee_status_value,
            'title2' => ''
        ]);
    }

    public function educationLevel($level){
        $user = Personal_Information::
        select(
            'personal_information.userid',
            \DB::raw("upper(concat(personal_information.fname,' ',personal_information.lname)) as name"),
            'des.description as designation',
            'sec.description as section',
            'div.description as division',
            'personal_information.sex',
            'personal_information.job_status',
            'em.description as employee_status_value',
            'em.id as employee_status_id',
            'edu_type.description as educational_background'
        )
            ->leftJoin('employee_status as em','em.id','=','personal_information.employee_status')
            ->leftJoin('dts.designation as des','des.id','=','personal_information.designation_id')
            ->leftJoin('dts.section as sec','sec.id','=','personal_information.section_id')
            ->leftJoin('dts.division as div','div.id','=','sec.division')
            ->leftJoin('educational_background as edu','edu.userid','=','personal_information.userid')
            ->leftJoin('education_type as edu_type','edu_type.id','=','edu.level')
            ->where('edu.level','=',$level)
            ->paginate('10');

        return view('filter.filter',[
            "user" => $user,
            'title1' => $user[0]->educational_background,
            'title2' => ''
        ]);
    }

    public function filterSection($section_id){
        $user = Personal_Information::
            select(
                DB::raw('DISTINCT personal_information.userid'),
                DB::raw("upper(concat(personal_information.fname,' ',personal_information.lname)) as name"),
                'des.description as designation',
                'sec.description as section',
                'div.description as division',
                'personal_information.sex',
                'personal_information.job_status',
                'em.description as employee_status_value',
                'em.id as employee_status_id'
            )
            ->leftJoin('employee_status as em','em.id','=','personal_information.employee_status')
            ->leftJoin('dts.designation as des','des.id','=','personal_information.designation_id')
            ->leftJoin('dts.section as sec','sec.id','=','personal_information.section_id')
            ->leftJoin('dts.division as div','div.id','=','sec.division')
            ->leftJoin('educational_background as edu','edu.userid','=','personal_information.userid')
            ->leftJoin('education_type as edu_type','edu_type.id','=','edu.level')
            ->where('personal_information.section_id','=',$section_id)
            ->paginate('15');

        return view('filter.filter',[
            "user" => $user,
            'title1' => Section::find($section_id)->description,
            'title2' => ''
        ]);
    }

}
