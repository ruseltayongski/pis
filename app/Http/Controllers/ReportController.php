<?php

namespace PIS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PIS\Designation;
use PIS\Division;
use PIS\Personal_Information;
use PIS\Work_Experience;
use PIS\Section;
use PIS\User_dts;
use Illuminate\Support\Facades\Auth;
use PIS\User;

class ReportController extends Controller
{
    public function no_salary_grade()
    {
        /*$employee = Personal_Information::
            join('work_experience', function ($join) {
                $join->on('personal_information.userid', '=', 'work_experience.userid');
            })
            ->where('work_experience.date_to','=','Present')
            ->pluck('work_experience.userid');

        $employee1 = Personal_Information::
            join('work_experience', function ($join) {
                $join->on('personal_information.userid', '=', 'work_experience.userid');
            })
            ->whereNotIn('work_experience.userid',$employee)
            ->get();*/

        $employee = Personal_Information::get();

        return view('pis_report.no_salary_grade',["employee" => $employee]);
    }
}
