<?php
namespace PIS\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use PIS\Http\Controllers\Controller;
use PIS\Personal_Information;
use PIS\Family_Background;
use Illuminate\Support\Facades\DB;
use PIS\User;
use PIS\User_dtr;
use PIS\User_dts;
use PIS\Users;

class FileController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function dateDuration($diff){
        $years   = floor($diff / (365*60*60*24));
        $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60));

        $minutes  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);

        $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));

        $duration = 0;
        if($years){
            if($years == 1)
                $duration = $years.' year';
            else
                $duration = $years.' years';
        }
        elseif($months){
            if($months == 1)
                $duration = $months.' month';
            else
                $duration = $months.' months';
        }
        elseif($days){
            if($days == 1)
                $duration = $days.' day';
            else
                $duration = $days.' days';
        }
        elseif($minutes){
            if($minutes == 1)
                $duration = $minutes.' minute';
            else
                $duration = $minutes.' minutes';
        }
        else
            $duration = 'Just Now';

        return $duration;
    }

    public function importExportExcelORCSV(){
        if(Auth::user()->usertype) {
            //return view('excel.import_export');
            $dashboard = \DB::connection('mysql')->select("call Dashboard()")[0];
            $recent = Personal_Information::
                                            select('personal_information.userid','personal_information.fname','employee_status.description as employee_status','personal_information.picture','personal_information.created_at')
                                            ->leftJoin('employee_status','employee_status.id','=','personal_information.employee_status')
                                            ->limit(12)
                                            ->orderBy('personal_information.created_at','desc')
                                            ->get();
            return view('home',[
                'dashboard' => $dashboard,
                'recent' => $recent
            ]);
        }
        else
            return Redirect::to('/pisProfile');
    }
    public function importFileIntoDB(Request $request){
        if($request->hasFile('personal_information')){
            $path = $request->file('personal_information')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){

                $count = 0;
                $useridArray['null'] = 'null';
                foreach ($data as $key => $value) {
                    $count++;
                    if(empty($value->userid)){
                        $useridFinal = 'pis_'.$count.'no_userid';
                    } else {
                        $useridFinal = $value->userid;
                    }

                    $fname = $value->fname;
                    $lname = $value->lname;
                    $personal_information = Personal_Information::where('userid','=',$useridFinal)
                        ->where(function($query) use ($fname,$lname ){
                            $query->where('fname','like',"%$fname%")
                            ->orWhere('lname','like',"%$lname%");
                        })
                        ->first();

                    if(isset($personal_information)){
                        if($personal_information->remarks == 'DTS_USER'){
                            $personal_information->update([
                                'fname' => $value->fname,
                                'lname' => $value->lname,
                                'mname' => $value->mname,
                                'name_extension' => $value->name_extension,
                                'position' => $value->position,
                                'date_of_birth' => $value->date_of_birth,
                                'place_of_birth' => $value->place_of_birth,
                                'sex' => $value->sex,
                                'civil_status' => $value->civil_status,
                                'citizenship' => $value->citizenship,
                                'height' => $value->height,
                                'weight' => $value->weight,
                                'blood_type' => $value->blood_type,
                                'gsis_idno' => $value->gsis_idno,
                                'gsis_polno' => $value->gsis_polno,
                                'pag_ibigno' => $value->pag_ibigno,
                                'phicno' => $value->phicno,
                                'sssno' => $value->sssno,
                                'tin_no' => $value->tin_no,
                                'residential_address' => $value->residential_address,
                                'residential_municipality' => $value->residential_municipality,
                                'residential_province' => $value->residential_province,
                                'region_zip' => $value->region_zip,
                                'telno' => $value->telno,
                                'email_address' => $value->email_address,
                                'cellno' => $value->cellno,
                                'employee_status' => $value->employee_status,
                                'job_status' => $value->job_status,
                                'inactive_area' => $value->inactive_area,
                                'remarks' => 'PIS',
                                'user_status' => "1"
                            ]);
                        }
                    } else {
                        $useridCheck = Personal_Information::where("userid","=",$useridFinal)->first();
                        if(isset($useridArray[$useridFinal])){
                            if($useridArray[$useridFinal] == $useridFinal){
                                $useridFinal = $value->userid.'c'.$count.'DUPLICATE1';
                            }
                        }
                        elseif(isset($useridCheck)){
                            if($useridCheck->remarks == 'DTS_USER'){
                                $useridFinal = $value->userid.'c'.$count.'DUPLICATE2';
                                $tempArray[] = $useridFinal;
                            }
                        }
                        else {
                            $useridArray[$useridFinal] = $useridFinal;
                        }
                        $arr[] = [
                            'userid' => $useridFinal,
                            'fname' => $value->fname,
                            'lname' => $value->lname,
                            'mname' => $value->mname,
                            'name_extension' => $value->name_extension,
                            'position' => $value->position,
                            'date_of_birth' => $value->date_of_birth,
                            'place_of_birth' => $value->place_of_birth,
                            'sex' => $value->sex,
                            'civil_status' => $value->civil_status,
                            'citizenship' => $value->citizenship,
                            'height' => $value->height,
                            'weight' => $value->weight,
                            'blood_type' => $value->blood_type,
                            'gsis_idno' => $value->gsis_idno,
                            'gsis_polno' => $value->gsis_polno,
                            'pag_ibigno' => $value->pag_ibigno,
                            'phicno' => $value->phicno,
                            'sssno' => $value->sssno,
                            'tin_no' => $value->tin_no,
                            'residential_address' => $value->residential_address,
                            'residential_municipality' => $value->residential_municipality,
                            'residential_province' => $value->residential_province,
                            'region_zip' => $value->region_zip,
                            'telno' => $value->telno,
                            'email_address' => $value->email_address,
                            'cellno' => $value->cellno,
                            'employee_status' => $value->employee_status,
                            'job_status' => $value->job_status,
                            'inactive_area' => $value->inactive_area,
                            'remarks' => 'PIS',
                            'user_status' => "1"
                        ];
                    }

                }
                if(!empty($arr)){
                    Personal_Information::insert($arr);
                    return Redirect::back()->with('success', 'Insert Record successfully.');
                }
            }
        }

        else if($request->hasFile('family_background')){
            $path = $request->file('family_background')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = [
                        'userid' => $value->userid,
                        'sln' => $value->sln,
                        'sfn' => $value->sfn,
                        'smn' => $value->smn,
                        'soccu' => $value->soccu,
                        'sbadd' => $value->sbadd,
                        'stelno' => $value->stelno,
                        'fln' => $value->fln,
                        'ffn' => $value->ffn,
                        'fmn' => $value->fmn,
                        'mmln' => $value->mmln,
                        'mfn' => $value->mfn,
                        'mmn' => $value->mmn,

                    ];
                }
                if(!empty($arr)){
                    \DB::table('family_background')->insert($arr);
                    return Redirect::back()->with('success', 'Insert Record successfully.');
                }
            }
        }

        else if($request->hasFile('educational_background')){
            $path = $request->file('educational_background')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = [
                        'userid' => $value->userid,
                        'level' => $value->level,
                        'name_of_school' => $value->name_of_school,
                        'degree_course' => $value->degree_couse,
                        'year_graduated' => $value->year_graduated,
                        'units_earned' => $value->units_earned,
                        'poa_from' => $value->poa_from,
                        'poa_to' => $value->poa_to,
                        'scholarship' => $value->scholarship

                    ];
                }
                if(!empty($arr)){
                    \DB::table('educational_background')->insert($arr);
                    return Redirect::back()->with('success', 'Insert Record successfully.');
                }
            }
        }

        else if($request->hasFile('civil_eligibility')){
            $path = $request->file('civil_eligibility')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = [
                        'userid' => $value->userid,
                        'career_service' => $value->career_service,
                        'rating' => $value->rating,
                        'date_of_examination' => $value->date_of_examination,
                        'place_examination' => $value->place_examination,
                        'license_number' => $value->license_number,
                        'date_of_validity' => $value->date_of_validity,

                    ];
                }
                if(!empty($arr)){
                    \DB::table('civil_eligibility')->insert($arr);
                    return Redirect::back()->with('success', 'Insert Record successfully.');
                }
            }
        }

        else if($request->hasFile('work_experience')){
            $path = $request->file('work_experience')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = [
                        'userid' => $value->userid,
                        'date_from' => $value->date_from,
                        'date_to' => $value->date_to,
                        'position_title' => $value->position_title,
                        'company' => $value->company,
                        'monthly_salary' => $value->monthly_salary,
                        'salary_grade' => $value->salary_grade,
                        'status_of_appointment' => $value->status_of_appointment,
                        'government_service' => $value->government_service,

                    ];
                }
                if(!empty($arr)){
                    \DB::table('work_experience')->insert($arr);
                    return Redirect::back()->with('success', 'Insert Record successfully.');
                }
            }
        }

        else if($request->hasFile('voluntary_work')){
            $path = $request->file('voluntary_work')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = [
                        'userid' => $value->userid,
                        'name_of_organization' => $value->name_of_organization,
                        'date_from' => $value->date_from,
                        'date_to' => $value->date_to,
                        'number_of_hours' => $value->number_of_hours,
                        'nature_of_work' => $value->nature_of_work,

                    ];
                }
                if(!empty($arr)){
                    \DB::table('voluntary_work')->insert($arr);
                    return Redirect::back()->with('success', 'Insert Record successfully.');
                }
            }
        }

        else if($request->hasFile('training_program')){
            $path = $request->file('training_program')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = [
                        'userid' => $value->userid,
                        'title_of_learning' => $value->title_of_learning,
                        'date_from' => $value->date_from,
                        'date_to' => $value->date_to,
                        'number_of_hours' => $value->number_of_hours,
                        'type_of_id' => $value->type_of_id,
                        'sponsored_by' => $value->sponsored_by,

                    ];
                }
                if(!empty($arr)){
                    \DB::table('training_program')->insert($arr);
                    return Redirect::back()->with('success', 'Insert Record successfully.');
                }
            }
        }

        else if($request->hasFile('other_information')){
            $path = $request->file('other_information')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = [
                        'userid' => $value->userid,
                        'special_skills' => $value->special_skills,
                        'recognition' => $value->recognition,
                        'organization' => $value->organization,

                    ];
                }
                if(!empty($arr)){
                    \DB::table('other_information')->insert($arr);
                    return Redirect::back()->with('success', 'Insert Record successfully.');
                }
            }
        }

        return Redirect::back()->with('error', 'Request data does not have any files to import.');
    } 
    public function downloadExcelFile($type){

        \Excel::create('personal_information', function($excel) {
            $count_all = Personal_Information::where('user_status','=','1')->get()->except(['id'])->toArray();

            $count_duplicateId = Personal_Information::where('user_status','=','1')
                ->where("userid",'like',"%duplicate%")->get()->except(['id'])->toArray();

            $newPersonal = new Personal_Information();
            $count_duplicateName = Personal_Information::where('user_status','=','1')
                ->whereIn('fname', function($query) use($newPersonal){
                    $query->select('fname')
                        ->from(with($newPersonal)->getTable())
                        ->groupBy('fname')
                        ->havingRaw('COUNT(fname)>1');
                })
                ->whereIn('lname', function($query) use($newPersonal){
                    $query->select('lname')
                        ->from(with($newPersonal)->getTable())
                        ->groupBy('lname')
                        ->havingRaw('COUNT(lname)>1');
                })->get()->except(['id'])->toArray();

            $count_inactive = Personal_Information::where('user_status','=','0')->get()->except(['id'])->toArray();

            $count_permanent = Personal_Information::where('user_status','=','1')->where('job_status','=','Permanent')->get()->except(['id'])->toArray();

            $count_jobOrder = Personal_Information::where('user_status','=','1')->where('job_status','=','Job Order')->get()->except(['id'])->toArray();

            $excel->sheet('ALL', function($sheet) use ($count_all)
            {
                $sheet->fromArray($count_all);
            });

            $excel->sheet('DUPLICATE_ID', function($sheet) use ($count_duplicateId)
            {
                $sheet->fromArray($count_duplicateId);
            });

            $excel->sheet('DUPLICATE_NAME', function($sheet) use ($count_duplicateName)
            {
                $sheet->fromArray($count_duplicateName);
            });

            $excel->sheet('INACTIVE', function($sheet) use ($count_inactive)
            {
                $sheet->fromArray($count_inactive);
            });

            $excel->sheet('PERMANENT', function($sheet) use ($count_permanent)
            {
                $sheet->fromArray($count_permanent);
            });

            $excel->sheet('JOB_ORDER', function($sheet) use ($count_jobOrder)
            {
                $sheet->fromArray($count_jobOrder);
            });


        })->download($type);
    }

    public function downloadExcelName(){
        \Excel::create('PISemployee', function ($excel) {
            $excel->sheet('ALL', function($sheet) {
                $headerColumn = array("Employee ID","Full Name");

                $sheet->appendRow($headerColumn);
                $sheet->row(1, function($row) {
                    $row->setFontFamily('Comic Sans MS');
                    $row->setFontSize(10);
                    $row->setFontWeight('bold');
                    $row->setBackground('#FFFF00');
                });

				$employee = Personal_Information::where('userid','!=','admin')
                        ->where('userid','NOT LIKE','%no_userid%')
                        ->where('userid','!=','doh7_it')
                        ->where('userid','!=','3075')
                        ->where('userid','!=','')
                        ->where('userid','NOT LIKE','%DUPLICATE%')
                        ->orderBy('lname','asc')
                        ->get();

				foreach($employee as $row){
				    !empty($row->mname) ? $mname = strtoupper($row->mname[0]) : $mname = '';

				    $data = array(
				        $row->userid,
                        $row->lname.' '.$row->fname.', '.$mname,
                    );
                    $sheet->appendRow($data);
                }

            });
        })->export('xlsx');
    }

    public function sync_dts(){
        $count = 0;
        foreach(User_dts::get() as $row){
            $count++;
            if($row->username == ''){
                $finalUserid = 'dts_'.$count.'no_userid';
            } else {
                $finalUserid = $row->username;
            }
            $user[] = [
                "username" => $finalUserid,
                "password" => $row->password,
                "usertype" => $row->user_priv
            ];
            if(strlen($row->username) >= 6){
                $job_status = 'Permanent';
            }
            else {
                $job_status = "Job Order";
            }
            $personal_information[] = [
                "userid" => $finalUserid,
                "fname" => $row->fname,
                "mname" => $row->mname,
                "lname" => $row->lname,
                "designation_id" => $row->designation,
                "division_id" => $row->division,
                "section_id" => $row->section,
                "remarks" => 'DTS_USER',
                'user_status' => "1",
                "employee_status" => "Active",
                "job_status" => $job_status,
                "disbursement_type" => "NO_CARDS"
            ];
        }
        //User::insertIgnore($user);
        Personal_Information::insertIgnore($personal_information);
        return Redirect::back()->with('sync_dts','Successfully sync dts user');
    }

    public function sync_personalInformation(){
        $count = 0;
        foreach(Personal_Information::get() as $row){
            if($row->userid == ''){
                $count++;
                $finalUserid = 'pis_'.$count.'no_userid';
            } else {
                $finalUserid = $row->userid;
            }
            $user[] = [
                "username" => $finalUserid,
                "password" => bcrypt($finalUserid),
                "usertype" => 0,
                "pin" => "1234"
            ];
        }
        User::insertIgnore($user);
        return Redirect::back()->with('sync_dts','Successfully sync PIS user');
    }

    public function sync_dtr(){
        $count = 0;
        foreach(User_dtr::get() as $row){
            $count++;
            $user[] = [
                "username" => $row->username,
                "password" => bcrypt($row->password),
                "usertype" => $row->usertype,
                "pin" => "1234"
            ];
            if(strlen($row->username) >= 6){
                $job_status = 'Permanent';
                $disbursement_type = 'ATM';
            }
            else {
                $job_status = "Job Order";
                $disbursement_type = 'CASH_CARD';
            }
            $personal_information[] = [
                "userid" => $row->username,
                "fname" => $row->fname,
                "mname" => $row->mname,
                "lname" => $row->lname,
                "remarks" => 'DTR_USER',
                'user_status' => "1",
                "employee_status" => "Active",
                "job_status" => $job_status,
                "disbursement_type" => $disbursement_type
            ];
        }

        User::insertIgnore($user);
        Personal_Information::insertIgnore($personal_information);

        return 'Successfully Sync DTR';
    }


    public function append_sched(){

        foreach(User_dtr::get() as $row){
            $personal_information = Personal_Information::where('userid','=',$row->username)->first();

            if( $personal_information ) {
                $personal_information->update([
                   "sched" => $row->sched
                ]);
            }

        };

        return 'Sucessfully Append Sched';

    }



}

