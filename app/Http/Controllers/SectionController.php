<?php

namespace PIS\Http\Controllers;

use Illuminate\Http\Request;
use PIS\Personal_Information;
use PIS\Section;
use PIS\User;
use PIS\User_dts;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function filterEmployee(){
        $filter_employee = Personal_Information::select("section.description as section",\DB::raw("concat(personal_information.fname,' ',personal_information.lname) as name"),"designation.description as designation")
                                ->leftJoin("dts.section","section.id","=","personal_information.section_id")
                                ->leftJoin("dts.designation","designation.id","=","personal_information.designation_id")
                                ->where("personal_information.section_id","21")
                                ->orWhere("personal_information.section_id","30")
                                ->orderBy("personal_information.section_id","asc")
                                ->get();

        return view('section.filter_employee',[
           "filter_employee" => $filter_employee
        ]);
    }
}
