<?php

namespace PIS\Http\Controllers;

use Illuminate\Http\Request;
use PIS\Personal_Information;

class PisController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personal_information = Personal_Information::all();
        return view('pis.pisList',[
            "personal_information" => $personal_information
        ]);
    }
}
