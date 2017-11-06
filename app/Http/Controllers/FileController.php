<?php
namespace PIS\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PIS\Http\Controllers\Controller;
use PIS\Personal_Information;
use PIS\Family_Background;

class FileController extends Controller {
    public function importExportExcelORCSV(){
        return view('excel.import_export');
    }
    public function importFileIntoDB(Request $request){
        if($request->hasFile('personal_information')){
            $path = $request->file('personal_information')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = [
                        'userid' => $value->userid,
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

                    ];
                }
                if(!empty($arr)){
                    \DB::table('personal_information')->insert($arr);
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
                        'title_of_learning' => $value->title_of_learning,
                        'date_from' => $value->date_from,
                        'date_to' => $value->date_to,
                        'number_of_hours' => $value->number_of_hours,
                        'type_of_id' => $value->type_of_id,
                        'sponsored_by' => $value->sponsored_by,

                    ];
                }
                if(!empty($arr)){
                    \DB::table('voluntary_work')->insert($arr);
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
        $personal_information = Personal_Information::get()->except(['id'])->toArray();
        return \Excel::create('personal_information', function($excel) use ($personal_information) {
            $excel->sheet('personal_information', function($sheet) use ($personal_information)
            {
                $sheet->fromArray($personal_information);
            });
        })->download($type);
    }      
}

