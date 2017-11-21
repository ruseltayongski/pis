<?php

namespace PIS\Http\Controllers;

use Illuminate\Http\Request;
use PIS\Designation;
use PIS\Division;
use PIS\Section;

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
        return view('auth.login',[
            "designation" => $designation,
            "division" => $division,
            "section" => $section
        ]);
    }
}
