<?php

namespace PIS\Http\Controllers;

use Illuminate\Http\Request;
use PIS\Children;
use PIS\Educational_Background;
use PIS\EducationType;
use PIS\Personal_Information;
use PIS\Family_Background;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

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

        $user = DB::table('personal_information as pi')
            ->leftjoin('family_background', 'pi.userid', '=', 'family_background.userid')
            ->leftjoin('children', 'pi.userid', '=', 'children.userid')
            ->where('pi.id',$userid)
            ->select('pi.id as piId','pi.*','pi.userid as piUserid','family_background.*','family_background.userid as fbUserid',
                'children.id as cId','children.userid as cUserid','children.name as cname','children.date_of_birth as cdate_of_birth')
            ->get();

        $education_type = EducationType::get();
        $educationalBackground = Educational_Background::where("userid",'=',$user[0]->piUserid)->orderBy('id','ASC')->get();

        return view('pis.pisProfile',[
            "user" => $user[0],
            "children" => $user,
            "education_type" => $education_type,
            "educationalBackground" => $educationalBackground,
        ]);

    }

    public function updatePersonalInformation(Request $request){

        $id = $request->get('id');
        $column = $request->get('column');
        $value = $request->get('value');

        return Personal_Information::where('id',$id)->update([
            $column => $value
        ]);
    }

    public function updateChildren(Request $request){

        $id = $request->get('id');
        $userid = $request->get('userid');
        $column = $request->get('column');
        $value = $request->get('value');

        return Children::updateOrCreate(
            ['id'=>$id],
            [
                'userid'=>$userid,
                $column=>$value
            ]
        );

    }

    public function updateFamilyBackground(Request $request){

        $userid = $request->get('userid');
        $column = $request->get('column');
        $value = $request->get('value');

        return Family_Background::updateOrCreate(
            ['userid'=>$userid],
            [
                'userid'=>$userid,
                $column=>$value
            ]
        );

    }

    public function updateEducationalBackground(Request $request){

        $id = $request->get('id');
        $userid = $request->get('userid');
        $column = $request->get('column');
        $value = $request->get('value');
        $level = $request->get('level');

        return Educational_Background::updateOrCreate(
            ['id'=>$id],
            [
                'userid'=>$userid,
                'level'=>$level,
                $column=>$value,
            ]
        );

    }


}
