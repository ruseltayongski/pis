<?php

namespace PIS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PIS\Designation;
use PIS\Division;
use PIS\Personal_Information;
use PIS\Section;
use PIS\User_dts;
use Illuminate\Support\Facades\Auth;

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
                "section" => $section
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
            ->where('personal_information.section_id','=',$section_id)
            ->paginate('10');

        return view('filter.filter',[
            "user" => $user,
            'title1' => Section::find($section_id)->description,
            'title2' => ''
        ]);
    }


}
