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
        $filter_employee = User_dts::select("section.description as section",\DB::raw("concat(users.fname,' ',users.lname) as name"),"designation.description as designation")
                                ->leftJoin("dts.section","section.id","=","users.section")
                                ->leftJoin("dts.designation","designation.id","=","users.designation")
                                ->where("users.section","4")
                                ->orWhere("users.section","30")
                                ->orderBy("users.section","asc")
                                ->get();

        return view('section.filter_employee',[
           "filter_employee" => $filter_employee
        ]);
    }
}
