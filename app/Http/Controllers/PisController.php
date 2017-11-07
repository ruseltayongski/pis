<?php

namespace PIS\Http\Controllers;

use Illuminate\Http\Request;
use PIS\Personal_Information;
use Illuminate\Support\Facades\Session;

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
    public function index(Request $request)
    {
        Session::put('keyword',$request->input('keyword'));
        $keyword = Session::get('keyword');

        $personal_information = Personal_Information::where(function($q) use ($keyword){
                $q->where('fname','like',"%$keyword%")
                    ->orWhere('mname','like',"%$keyword%")
                    ->orWhere('lname','like',"%$keyword%");
            })
            ->orderBy('fname','asc')
            ->paginate(10);

        return view('pis.pisList',[
            "personal_information" => $personal_information
        ]);
    }

    public function pisInfo($userid){
        $user = Personal_Information::where('id',$userid)->first();
        return view('pis.pisInfo',[
            "user" => $user,
        ]);
    }

    public function pisProfile($userid){
        $user = Personal_Information::where('id',$userid)->first();
        return view('pis.pisProfile',[
            "user" => $user,
        ]);
    }

}
