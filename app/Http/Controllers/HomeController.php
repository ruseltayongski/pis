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
}
