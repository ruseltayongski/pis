<?php

namespace PIS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use PIS\Children;
use PIS\Civil_Eligibility;
use PIS\Educational_Background;
use PIS\EducationType;
use PIS\Personal_Information;
use PIS\Family_Background;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use PIS\SalaryGrade;
use PIS\Training_Program;
use PIS\User;
use PIS\Voluntary_Work;
use PIS\Work_Experience;
use PIS\Other_Information;
use PIS\Designation;
use PIS\Division;
use PIS\Section;
use Illuminate\Support\Facades\App;

class PisController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function pisList(Request $request)
    {
        Session::put('keyword',$request->input('keyword'));
        $keyword = Session::get('keyword');
        if($request->get('type')){
            $type = $request->get('type');
        } else {
            $type = 'ALL';
        }
        if ($type == 'ALL'){
            $personal_information = Personal_Information::
            where('user_status','=','1')
            ->where(function($q) use ($keyword){
                $q->where('fname','like',"%$keyword%")
                    ->orWhere('mname','like',"%$keyword%")
                    ->orWhere('lname','like',"%$keyword%")
                    ->orWhere('userid','like',"%$keyword%");
            })
                ->orderBy('fname','asc')
                ->paginate(10);
        }
        elseif($type == 'DUPLICATE_ID') {
            $personal_information = Personal_Information::
                where('user_status','=','1')
                ->where("userid",'like',"%duplicate%")
                ->where(function($q) use ($keyword){
                $q->where('fname','like',"%$keyword%")
                    ->orWhere('mname','like',"%$keyword%")
                    ->orWhere('lname','like',"%$keyword%")
                    ->orWhere('userid','like',"%$keyword%");
                })
                ->orderBy('fname','asc')
                ->paginate(10);
        }
        elseif($type == 'DUPLICATE_NAME'){
            $newPersonal = new Personal_Information();
            $personal_information = DB::table('personal_information')
                ->where('user_status','=','1')
                ->where(function($q) use ($keyword){
                    $q->where('fname','like',"%$keyword%")
                        ->orWhere('mname','like',"%$keyword%")
                        ->orWhere('lname','like',"%$keyword%")
                        ->orWhere('userid','like',"%$keyword%");
                })
                ->whereIn('fname', function($query) use($newPersonal){
                    $query->select('fname')
                        ->from(with($newPersonal)->getTable())
                        ->groupBy('fname')
                        ->havingRaw('COUNT(fname)>1');
                })
                ->whereIn('lname', function($query) use($newPersonal){
                    $query->select('lname')
                        ->from(with($newPersonal)->getTable())
                        ->groupBy('lname')
                        ->havingRaw('COUNT(lname)>1');
                })
                ->orderBy('fname','ASC')
                ->paginate(10);
        }
        elseif ($type == 'INACTIVE'){
            $personal_information = Personal_Information::
            where('user_status','=','0')
                ->where(function($q) use ($keyword){
                    $q->where('fname','like',"%$keyword%")
                        ->orWhere('mname','like',"%$keyword%")
                        ->orWhere('lname','like',"%$keyword%")
                        ->orWhere('userid','like',"%$keyword%");
                })
                ->orderBy('fname','asc')
                ->paginate(10);
        }
        elseif ($type == 'PERMANENT'){
            $personal_information = Personal_Information::
            where('user_status','=','1')
                ->where('job_status','=','Permanent')
                ->where(function($q) use ($keyword){
                    $q->where('fname','like',"%$keyword%")
                        ->orWhere('mname','like',"%$keyword%")
                        ->orWhere('lname','like',"%$keyword%")
                        ->orWhere('userid','like',"%$keyword%");
                })
                ->orderBy('fname','asc')
                ->paginate(10);
        }
        elseif ($type == 'JOB_ORDER'){
            $personal_information = Personal_Information::
            where('user_status','=','1')
                ->where('job_status','=','Job Order')
                ->where(function($q) use ($keyword){
                    $q->where('fname','like',"%$keyword%")
                        ->orWhere('mname','like',"%$keyword%")
                        ->orWhere('lname','like',"%$keyword%")
                        ->orWhere('userid','like',"%$keyword%");
                })
                ->orderBy('fname','asc')
                ->paginate(10);
        }

        if ($request->isMethod('post')) {
            return response()->json([
                "view" => view('pis.pisPagination', [
                    "personal_information" => $personal_information,
                    "type" => $type
                ])->render()
            ]);
        }

        $count_all = Personal_Information::
            where('user_status','=','1')
            ->where(function($q) use ($keyword){
            $q->where('fname','like',"%$keyword%")
                ->orWhere('mname','like',"%$keyword%")
                ->orWhere('lname','like',"%$keyword%")
                ->orWhere('userid','like',"%$keyword%");
        })->get();

        $newPersonal = new Personal_Information();
        $count_duplicateId = Personal_Information::
            where('user_status','=','1')
            ->where("userid",'like',"%duplicate%")
            ->where(function($q) use ($keyword){
                $q->where('fname','like',"%$keyword%")
                    ->orWhere('mname','like',"%$keyword%")
                    ->orWhere('lname','like',"%$keyword%")
                    ->orWhere('userid','like',"%$keyword%");
            })->get();
        $count_duplicateName = DB::table('personal_information')
            ->where('user_status','=','1')
            ->where(function($q) use ($keyword){
                $q->where('fname','like',"%$keyword%")
                    ->orWhere('mname','like',"%$keyword%")
                    ->orWhere('lname','like',"%$keyword%")
                    ->orWhere('userid','like',"%$keyword%");
            })
            ->whereIn('fname', function($query) use($newPersonal){
                $query->select('fname')
                    ->from(with($newPersonal)->getTable())
                    ->groupBy('fname')
                    ->havingRaw('COUNT(fname)>1');
            })
            ->whereIn('lname', function($query) use($newPersonal){
                $query->select('lname')
                    ->from(with($newPersonal)->getTable())
                    ->groupBy('lname')
                    ->havingRaw('COUNT(lname)>1');
            })->get();

        $count_inactive = Personal_Information::
             where('user_status','=','0')
            ->where(function($q) use ($keyword){
                $q->where('fname','like',"%$keyword%")
                    ->orWhere('mname','like',"%$keyword%")
                    ->orWhere('lname','like',"%$keyword%")
                    ->orWhere('userid','like',"%$keyword%");
            })->get();
        $count_permanent = Personal_Information::
        where('user_status','=','1')
            ->where('job_status','=','Permanent')
            ->where(function($q) use ($keyword){
                $q->where('fname','like',"%$keyword%")
                    ->orWhere('mname','like',"%$keyword%")
                    ->orWhere('lname','like',"%$keyword%")
                    ->orWhere('userid','like',"%$keyword%");
            })->get();
        $count_jobOrder = Personal_Information::
        where('user_status','=','1')
            ->where('job_status','=','Job Order')
            ->where(function($q) use ($keyword){
                $q->where('fname','like',"%$keyword%")
                    ->orWhere('mname','like',"%$keyword%")
                    ->orWhere('lname','like',"%$keyword%")
                    ->orWhere('userid','like',"%$keyword%");
            })->get();

        $countArray['ALL'] = count($count_all);
        $countArray['DUPLICATE_ID'] = count($count_duplicateId);
        $countArray['DUPLICATE_NAME'] = count($count_duplicateName);
        $countArray['INACTIVE'] = count($count_inactive);
        $countArray['PERMANENT'] = count($count_permanent);
        $countArray['JOB_ORDER'] = count($count_jobOrder);

        return view('pis.pisList',[
            "personal_information" => $personal_information,
            "type" => $type,
            "countArray" => $countArray
        ]);
    }

    public function pisForm(){
        $designation = Designation::get();
        $division = Division::get();
        $section = Section::get();
        return view('pis.pisForm',[
            "designation" => $designation,
            "division" => $division,
            "section" => $section
        ]);
    }

    public function pisInfo($userid){
        $user = Personal_Information::where('userid',$userid)->first();
        return view('pis.pisInfo',[
            "user" => $user,
        ]);
    }

    public function pisProfile($userid = null){
        if($userid && Auth::user()->usertype){
            $finalId = $userid;
        }
        else {
            $finalId = Auth::user()->username;
        }

        $user = DB::table('personal_information as pi')
            ->leftjoin('family_background', 'pi.userid', '=', 'family_background.userid')
            ->leftjoin('children', 'pi.userid', '=', 'children.userid')
            ->where('pi.userid',$finalId)
                ->select('pi.id as piId','pi.*','pi.userid as piUserid','family_background.*','family_background.userid as fbUserid',
                'children.id as cId','children.userid as cUserid','children.name as cname','children.date_of_birth as cdate_of_birth')
            ->get();

        $section = Section::get();
        $division = Division::get();
        $education_type = EducationType::get();
        $educationalBackground = Educational_Background::where("userid",'=',$user[0]->piUserid)->orderBy('id','ASC')->get();
        $children = Children::where('userid','=',$user[0]->piUserid)->orderBy('id','ASC')->get();
        $civil_eligibility = Civil_Eligibility::where('userid','=',$user[0]->piUserid)->orderBy('id','ASC')->get();
        $work_experience = Work_Experience::where('userid','=',$user[0]->piUserid)->orderBy('id','ASC')->get();
        $voluntary_work = Voluntary_Work::where('userid','=',$user[0]->piUserid)->orderBy('id','ASC')->get();
        $training_program = Training_Program::where('userid','=',$user[0]->piUserid)->orderBy('id','ASC')->get();
        $other_information = Other_Information::where('userid','=',$user[0]->piUserid)->orderBy('id','ASC')->get();
        $designation = Designation::get();

        return view('pis.pisProfile',[
            "section" => $section,
            "division" => $division,
            "user" => $user[0],
            "children" => $children,
            "education_type" => $education_type,
            "educationalBackground" => $educationalBackground,
            "civil_eligibility" => $civil_eligibility,
            "work_experience" => $work_experience,
            "voluntary_work" => $voluntary_work,
            "training_program" => $training_program,
            "other_information" => $other_information,
            "designation" => $designation
        ]);

    }

    public function updatePersonalInformation(Request $request){

        $id = $request->get('id');
        $column = $request->get('column');
        $value = $request->get('value');

        if($column == 'division_id'){
            $arrayValue = [
                $column => $value,
                "section_id" => Section::where('division','=',$value)->first()->id
            ];
        } else {
            $arrayValue = [
                $column => $value
            ];
        }

        return Personal_Information::where('id',$id)->update($arrayValue);
    }

    public function updateChildren(Request $request){

        $id = $request->get('id');
        $userid = $request->get('userid');
        $column = $request->get('column');
        $value = $request->get('value');

        Children::updateOrCreate(
            ['id'=>$id],
            [
                'userid'=>$userid,
                $column=>$value
            ]
        );

        return DB::select("show table status like 'children'")[0]->Auto_increment;
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

        if(is_null($request->get('unique_row'))){
            $unique_row = 'no unique row';
        } else {
            $unique_row = $request->get('unique_row');
        }

        $educational_background = Educational_Background::where('id',$request->get('id'))
            ->orWhere('unique_row', $unique_row)
            ->first();

        if(is_null($educational_background)){
            Educational_Background::create([
                'userid'=>$request->get('userid'),
                'level'=>$request->get('level'),
                'unique_row'=>$request->get('unique_row'),
                $request->get('column')=>$request->get('value')
            ]);

            return 'successfully added';
        } else {
            $educational_background->update([
                $request->get('column')=>$request->get('value')
            ]);

            return 'successfully updated';
        }

    }

    public function updateCivilEligibility(Request $request){

        $id = $request->get('id');
        $userid = $request->get('userid');
        $unique_row = $request->get('unique_row');
        $column = $request->get('column');
        $value = $request->get('value');

        if(is_null($unique_row)){
            $unique_row = 'no unique row';
        }

        $civil_eligibility = Civil_Eligibility::where('id',$id)
            ->orWhere('unique_row', $unique_row)
            ->first();

        if(is_null($civil_eligibility)){
            Civil_Eligibility::create([
                'userid'=>$userid,
                'unique_row'=>$unique_row,
                $column=>$value
            ]);

            return 'successfully added';
        } else {
            $civil_eligibility->update([
                $column=>$value
            ]);

            return 'successfully updated';
        }

    }

    public function updateWorkExperience(Request $request){
        if(is_null($request->get('unique_row'))){
            $unique_row = 'no unique row';
        } else {
            $unique_row = $request->get('unique_row');
        }

        if ($request->get('column') == 'salary_grade'){
            $salary_amount = SalaryGrade::where('salary_tranche','=',$request->get('salary_tranche'))
                                ->where('salary_grade','=',$request->get('salary_grade'))
                                ->where('salary_step','=',$request->get('salary_step'))
                                ->first()
                                ->salary_amount;
            $work_experience = Work_Experience::where('id','=',$request->get('id'))
                                                ->orWhere('unique_row',$unique_row)
                                                ->first();
            if(is_null($work_experience)){
                Work_Experience::create([
                    'userid'=>$request->get('userid'),
                    'unique_row'=>$request->get('unique_row'),
                    'monthly_salary'=>$salary_amount,
                    $request->get('column')=>$request->get('value')
                ]);
            }
            else {
                $work_experience->update([
                    "salary_grade" => $request->get('value'),//value instead of salary grade kay lahi nag format ang salary grade
                    "monthly_salary" => $salary_amount
                ]);
            }

            return $salary_amount;
        }
        else {
            $work_experience = Work_Experience::where('id',$request->get('id'))
                ->orWhere('unique_row', $unique_row)
                ->first();

            if(is_null($work_experience)){
                Work_Experience::create([
                    'userid'=>$request->get('userid'),
                    'unique_row'=>$request->get('unique_row'),
                    $request->get('column')=>$request->get('value')
                ]);

                return 'Successfully Added';
            }
            else {
                $work_experience->update([
                    $request->get('column')=>$request->get('value')
                ]);

                return 'Successfully Updated';
            }
        }
    }


    public function updateVoluntaryWork(Request $request){
        if(is_null($request->get('unique_row'))){
            $unique_row = 'no unique row';
        } else {
            $unique_row = $request->get('unique_row');
        }

        $voluntary_work = Voluntary_Work::where('id',$request->get('id'))
            ->orWhere('unique_row', $unique_row)
            ->first();

        if(is_null($voluntary_work)){
            Voluntary_Work::create([
                'userid'=>$request->get('userid'),
                'unique_row'=>$request->get('unique_row'),
                $request->get('column')=>$request->get('value')
            ]);

            return 'successfully added';
        } else {
            $voluntary_work->update([
                $request->get('column')=>$request->get('value')
            ]);

            return 'successfully updated';
        }

    }

    public function updateTrainingProgram(Request $request){

        if(is_null($request->get('unique_row'))){
            $unique_row = 'no unique row';
        } else {
            $unique_row = $request->get('unique_row');
        }

        $training_program = Training_Program::where('id',$request->get('id'))
            ->orWhere('unique_row', $unique_row)
            ->first();

        if(is_null($training_program)){
            Training_Program::create([
                'userid'=>$request->get('userid'),
                'unique_row'=>$request->get('unique_row'),
                $request->get('column')=>$request->get('value')
            ]);

            return 'successfully added';
        } else {
            $training_program->update([
                $request->get('column')=>$request->get('value')
            ]);

            return 'successfully updated';
        }

    }

    public function updateOtherInformation(Request $request){

        if(is_null($request->get('unique_row'))){
            $unique_row = 'no unique row';
        } else {
            $unique_row = $request->get('unique_row');
        }

        $other_information = Other_Information::where('id',$request->get('id'))
            ->orWhere('unique_row', $unique_row)
            ->first();

        if(is_null($other_information)){
            Other_Information::create([
                'userid'=>$request->get('userid'),
                'unique_row'=>$request->get('unique_row'),
                $request->get('column')=>$request->get('value')
            ]);

            return 'successfully added';
        } else {
            $other_information->update([
                $request->get('column')=>$request->get('value')
            ]);

            return 'successfully updated';
        }

    }

    public function uploadPicture(Request $request){
        $userid = $request->get('userid');

        $picture = $request->file('picture');
        $extension = $picture->getClientOriginalExtension(); // getting excel extension
        $dir = public_path().'/upload_picture/picture';
        $filename = uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;

        Personal_Information::where('userid','=',$userid)->update([
            'picture' => $filename
        ]);

        return $picture->move($dir, $filename);
    }

    public function uploadSignature(Request $request){
        $userid = $request->get('userid');

        $signature = $request->file('signature');
        $extension = $signature->getClientOriginalExtension(); // getting excel extension
        $dir = public_path().'/upload_picture/signature';
        $filename = uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;

        Personal_Information::where('userid','=',$userid)->update([
            'signature' => $filename
        ]);

        return $signature->move($dir, $filename);
    }

    public function deletePersonalInformation(Request $request){
        $userid = $request->userid;
        Personal_Information::where('userid','=',$userid)->first()->delete();
        User::where('username','=',$userid)->first()->delete();

        /*Personal_Information::where('userid','=',$userid)->update([
            "user_status" => "0"
        ]);
        User::where('username','=',$userid)->update([
           "user_status" => "0"
        ]);*/
    }

    public function pisId($userid = null,$paper = null){
        $user = Personal_Information::where('userid','=',$userid)->first();
        $name = $user->fname.' '.$user->mname.' '.$user->lname;
        if(strlen($name) == 17){
            $widthScale = 17;
        }
        $widthScale = 17;
        $fontSize = 20;
        if($paper == 'landscape'){
            $view = view('pis.pisId_landscape',[
                "name" => $name,
                "fontSize" => $fontSize,
                "widthScale" => $widthScale,
                "user" => $user
            ]);
        }
        else {
            $view = view('pis.pisId_portrait',[
                "user" => $user
            ]);
        }

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', $paper);
        return $pdf->stream();
    }

    public function sirBong(){
        $newPersonal = new Personal_Information();
        $personal_information = DB::table('personal_information')
            ->where('user_status','=','1')
            ->whereRaw('LENGTH(userid) <= 6')
            ->whereIn('fname', function($query) use($newPersonal){
                $query->select('fname')
                    ->from(with($newPersonal)->getTable())
                    ->groupBy('fname')
                    ->havingRaw('COUNT(fname)>1');
            })
            ->whereIn('lname', function($query) use($newPersonal){
                $query->select('lname')
                    ->from(with($newPersonal)->getTable())
                    ->groupBy('lname')
                    ->havingRaw('COUNT(lname)>1');
            })
            ->orderBy('fname','ASC')->get();

        return view('welcome',[
            "personal_information" => $personal_information
        ]);
    }

}
