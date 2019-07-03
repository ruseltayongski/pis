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
use PIS\Survey;
use PIS\Training_Program;
use PIS\User;
use PIS\User_dtr;
use PIS\Voluntary_Work;
use PIS\Work_Experience;
use PIS\Other_Information;
use PIS\Designation;
use PIS\Division;
use PIS\Section;
use PIS\User_dts;
use Illuminate\Support\Facades\App;
use File;

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
        $personal_select = '';
        $keyword = Session::get('keyword');
        if($request->get('type')){
            $type = $request->get('type');
        } else {
            $type = 'ALL';
        }
        if ($type == 'ALL'){
            $personal_select = Personal_Information::orderBy('fname','asc')->get();
            $personal_information = Personal_Information::
            where('user_status','=','1')
            ->where(function($q) use ($keyword){
                $q->where('fname','like',"%$keyword%")
                    ->orWhere('mname','like',"%$keyword%")
                    ->orWhere('lname','like',"%$keyword%")
                    ->orWhere('userid','like',"%$keyword%")
                    ->orWhereRaw("concat(fname,' ',lname,', ',mname) like '%$keyword%' ")
                    ->orWhereRaw("concat(fname,' ',lname) like '%$keyword%' ")
                    ->orWhereRaw("concat(lname,', ',mname) like '%$keyword%' ")
                    ->orWhereRaw("concat(fname,', ',mname) like '%$keyword%' ");
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
                    ->orWhere('userid','like',"%$keyword%")
                    ->orWhereRaw("concat(fname,' ',lname,', ',mname) like '%$keyword%' ");
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
        elseif($type == 'INACTIVE'){
            $personal_information = Personal_Information::
            where('user_status','=','0')
                ->where(function($q) use ($keyword){
                    $q->where('fname','like',"%$keyword%")
                        ->orWhere('mname','like',"%$keyword%")
                        ->orWhere('lname','like',"%$keyword%")
                        ->orWhere('userid','like',"%$keyword%")
                        ->orWhereRaw("concat(fname,' ',lname,', ',mname) like '%$keyword%' ");
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
                        ->orWhere('userid','like',"%$keyword%")
                        ->orWhereRaw("concat(fname,' ',lname,', ',mname) like '%$keyword%' ");
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
                        ->orWhere('userid','like',"%$keyword%")
                        ->orWhereRaw("concat(fname,' ',lname,', ',mname) like '%$keyword%' ");
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
            "countArray" => $countArray,
            "personal_select" => $personal_select
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
            ->leftjoin('survey','pi.userid','=','survey.userid')
            ->where('pi.userid',$finalId)
                ->select('pi.id as piId','pi.*','pi.userid as piUserid','family_background.*','family_background.userid as fbUserid',
                'survey.*','survey.userid as surveyUserid',
                'children.id as cId','children.userid as cUserid','children.name as cname','children.date_of_birth as cdate_of_birth')
            ->get();

        $section = Section::get();
        $division = Division::get();
        $education_type = EducationType::get();
        $educationalBackground = Educational_Background::where("userid",'=',$user[0]->piUserid)->orderBy('id','ASC')->get();
        $children = Children::where('userid','=',$user[0]->piUserid)->orderBy('id','ASC')->get();
        $civil_eligibility = Civil_Eligibility::where('userid','=',$user[0]->piUserid)->orderBy('id','ASC')->get();
        $work_experience = \DB::connection('mysql')->select("SELECT * FROM `work_experience` WHERE userid = '$finalId' order by STR_TO_DATE(date_from,'%m/%d/%Y') DESC");
        $voluntary_work = Voluntary_Work::where('userid','=',$user[0]->piUserid)->orderBy('id','ASC')->get();
        $training_program = \DB::connection('mysql')->select("SELECT * FROM `training_program` WHERE userid = '$finalId' order by STR_TO_DATE(date_from,'%m/%d/%Y') DESC");
        $other_information = Other_Information::where('userid','=',$user[0]->piUserid)->orderBy('id','ASC')->get();
        $designation = Designation::orderBy('description')->get();

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

    public function updateUserid(Request $request){
        $previousId = $request->previousId;
        $currentId = $request->currentId;

        if($personal_information = Personal_Information::where('userid','=',$previousId)->first()){
            $personal_information->update([
                "userid" => $currentId
            ]);
        }

        if($user = User::where('username','=',$previousId)->first()){
            $user->update([
                "userid" => $currentId
            ]);
        }

        if($user_dtr = User_dtr::where('userid','=',$previousId)->first()){
            $user_dtr->update([
                "userid" => $currentId
            ]);
        }

        if($user_dts = User_dts::where('username','=',$previousId)->first()){
            $user_dts->update([
                "userid" => $currentId
            ]);
        }

        return "Successfully Updated";
    }

    public function updatePersonalInformation(Request $request){

        $id = $request->get('id');
        $column = $request->get('column');
        $value = $request->get('value');
        $indicate_country = $request->get('indicate_country');

        if($column == 'division_id'){
            $arrayValue = [
                $column => $value,
                "section_id" => Section::where('division','=',$value)->first()->id
            ];
        } else {
            if($indicate_country){
                $arrayValue = [
                    $column => $value,
                    'indicate_country' => $indicate_country
                ];
            } else {
                $arrayValue = [
                    $column => $value
                ];
            }
        }

        Personal_Information::where('id',$id)->first()->update($arrayValue);

        return 'Successfully Updated Personal Information';
    }

    public function updateSurvey(Request $request){

        $userid = $request->get('userid');
        $column = $request->get('column');
        $value = $request->get('value');

        Survey::updateOrCreate(
            ['userid'=>$userid],
            [
                "userid" => $userid,
                $column=>$value
            ]
        );

        return 'Successfully Updated Survey';
    }

    public function updateChildren(Request $request)
    {
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

    public function deleteChildren(Request $request)
    {
        $id = $request->id;
        $children = new Children();
        $children->setConnection('pis');
        $children->find($id)->delete();

        return 'Successfully Children Deleted';
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
                'userid' => $request->get('userid'),
                'unique_row' => $request->get('unique_row'),
                $request->get('column') => $request->get('value'),
                'level' => $request->get('level')
            ]);

            return 'successfully added';
        } else {
            if( $request->get('column') ){
                $educational_background->update([
                    $request->get('column')=>$request->get('value')
                ]);
            } else {
                $educational_background->update([
                    'level' => $request->get('level')
                ]);
            }

            return 'successfully updated';
        }

    }

    public function updateCivilEligibility(Request $request)
    {

        $id = $request->get('id');
        $userid = $request->get('userid');
        $unique_row = $request->get('unique_row');
        $column = $request->get('column');
        $value = $request->get('value');

        if(is_null($unique_row)){
            $unique_row = 'no unique row';
        }

        $civil_eligibility = Civil_Eligibility::where('id','=',$id)
            ->orWhere('unique_row','=',$unique_row)
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

    public function deleteCivilEligibility(Request $request)
    {
        $id = $request->id;
        if(is_null($request->unique_row)){
            $unique_row = 'no unique row';
        } else {
            $unique_row = $request->unique_row;
        }

        Civil_Eligibility::where('id','=',$id)->orWhere("unique_row","=",$unique_row)->first()->delete();

        return 'Successfully Deleted Civil Service Eligibility';
    }

    public function deleteEducationalBackground(Request $request)
    {
        $id = $request->id;
        if(is_null($request->unique_row)){
            $unique_row = 'no unique row';
        } else {
            $unique_row = $request->unique_row;
        }

        $educational_background = Educational_Background::where('id','=',$id)->orWhere("unique_row","=",$unique_row)->first();

        if($educational_background){
            $educational_background->delete();
            return 'Successfully Deleted Educational Background';
        }

    }

    public function deleteOtherInformation(Request $request)
    {
        $id = $request->id;
        if(is_null($request->unique_row)){
            $unique_row = 'no unique row';
        } else {
            $unique_row = $request->unique_row;
        }

        $other_information = Other_Information::where('id','=',$id)->orWhere("unique_row","=",$unique_row)->first();

        if($other_information){
            $other_information->delete();
            return 'Successfully Deleted Other Information';
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

    public function deleteWorkExperience(Request $request){
        $id = $request->id;
        
        if(is_null($request->unique_row)){
            $unique_row = 'no unique row';
        } else {
            $unique_row = $request->unique_row;
        }

        Work_Experience::where('id','=',$id)->orWhere("unique_row","=",$unique_row)->first()->delete();

        return 'Successfully Deleted Work Experience';
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

    public function deleteVoluntaryWork(Request $request)
    {
        $id = $request->id;
        if(is_null($request->unique_row)){
            $unique_row = 'no unique row';
        } else {
            $unique_row = $request->unique_row;
        }

        Voluntary_Work::where('id','=',$id)->orWhere("unique_row","=",$unique_row)->first()->delete();

        return 'Successfully Deleted Voluntary Work';
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

    public function deleteTrainingProgram(Request $request)
    {
        $file = $request->path;
        $pathtoDelete = public_path('upload_picture/certificate/'.$file);
        if( file_exists($pathtoDelete) ){
            File::delete($pathtoDelete);
        }

        $id = $request->id;
        if(is_null($request->unique_row)){
            $unique_row = 'no unique row';
        } else {
            $unique_row = $request->unique_row;
        }

        Training_Program::where('id','=',$id)->orWhere("unique_row","=",$unique_row)->first()->delete();

        return 'Successfully Deleted Training Program';
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

    public function uploadCertificate(Request $request){
        $userid = $request->get('userid');
        $trainingId = $request->get('trainingId');

        $picture = $request->file('certificate');
        $extension = $picture->getClientOriginalExtension(); // getting excel extension
        $dir = public_path().'/upload_picture/certificate';
        $filename = $request->file('certificate')->getClientOriginalName().'johndoe'.uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;


        if(is_null($request->get('unique_row'))){
            $unique_row = 'no unique row';
        } else {
            $unique_row = $request->get('unique_row');
        }

        $training_program = Training_Program::where('id','=',$trainingId)
            ->orWhere('unique_row','=',$unique_row)
            ->first();

        if(is_null($training_program)){
            Training_Program::create([
                'userid'=>$userid,
                'unique_row'=>$unique_row,
                'certificate'=>$filename
            ]);

        } else {
            Training_Program::where('userid','=',$userid)->where('id','=',$trainingId)->update([
                'certificate' => $filename
            ]);

        }

        $picture->move($dir, $filename);

        return $filename;
    }

    public function deletePersonalInformation(Request $request){
        $userid = $request->userid;
        Personal_Information::where('userid','=',$userid)->first()->delete();
        User::where('username','=',$userid)->first()->delete();
        //User_dtr::where('userid','=',$userid)->first()->delete();
        User_dts::where('username','=',$userid)->first()->delete();

        /*Personal_Information::where('userid','=',$userid)->update([
            "user_status" => "0"
        ]);
        User::where('username','=',$userid)->update([
           "user_status" => "0"
        ]);*/
    }


    public function nameSize($sizeLength){
        $nameSize['font'] = 10;
        $nameSize['left'] = 5;
        $nameSize['top'] = 63;
        $nameSize['width'] = 1.2;
        $nameSize['height'] = 6.3;
        if($sizeLength == 30){
            $nameSize['font'] = 10;
            $nameSize['left'] += 1.4;//
            $nameSize['width'] += .1;//
            $nameSize['height'] = 6.3;
        }
        elseif($sizeLength == 29){
            $nameSize['font'] = 10;
            $nameSize['left'] += 2.4;//
            $nameSize['width'] += .1;
            $nameSize['height'] = 6.3;
        }
        elseif($sizeLength == 28){
            $nameSize['font'] = 10;
            $nameSize['left'] += 4;
            $nameSize['width'] += .2;//
            $nameSize['height'] = 6.3;
        }
        elseif($sizeLength == 27){
            $nameSize['font'] = 10;
            $nameSize['left'] += 3.4;//
            $nameSize['width'] += .2;
            $nameSize['height'] = 6.3;
        }
        elseif($sizeLength == 26){
            $nameSize['font'] = 10;
            $nameSize['left'] += 4.2;//
            $nameSize['top'] = 63;
            $nameSize['width'] += .3;
            $nameSize['height'] = 6.3;
        }
        elseif($sizeLength == 25){
            $nameSize['font'] = 10;
            $nameSize['left'] += 5;//
            $nameSize['width'] += .3;
            $nameSize['height'] = 6.3;
        }
        elseif($sizeLength == 24){
            $nameSize['font'] = 10;
            $nameSize['left'] += 5.5;
            $nameSize['width'] += .4;//
            $nameSize['height'] = 6.3;
        }
        elseif($sizeLength == 23){
            $nameSize['font'] = 10;
            $nameSize['left'] += 8.5;
            $nameSize['width'] += .4;
            $nameSize['height'] = 6.3;
        }
        elseif($sizeLength == 22){
            $nameSize['font'] = 10;
            $nameSize['left'] += 6.5;
            $nameSize['width'] += .5;//
            $nameSize['height'] = 6.3;
        }
        elseif($sizeLength == 21){
            $nameSize['font'] = 10;
            $nameSize['left'] += 7;//
            $nameSize['width'] += .6;//
            $nameSize['height'] = 6.3;
        }
        elseif($sizeLength == 20){
            $nameSize['font'] = 10;
            $nameSize['left'] += 8.5;//
            $nameSize['width'] += .7;//
            $nameSize['height'] = 6.3;
        }
        elseif($sizeLength == 19){
            $nameSize['font'] = 10;
            $nameSize['left'] += 9.2;//
            $nameSize['width'] += .8;//
            $nameSize['height'] = 6.3;
        }
        elseif($sizeLength == 18){
            $nameSize['font'] = 10;
            $nameSize['left'] += 9;//
            $nameSize['width'] += .9;//
            $nameSize['height'] = 6.3;
        }
        elseif($sizeLength == 17){
            $nameSize['font'] = 10;
            $nameSize['left'] += 9.4;//
            $nameSize['width'] += 1.1;//
            $nameSize['height'] = 6.3;
        }
        elseif($sizeLength == 16){
            $nameSize['font'] = 10;
            $nameSize['left'] += 11;//
            $nameSize['width'] += 1.3;//
            $nameSize['height'] = 6.3;
        }
        elseif($sizeLength == 15){
            $nameSize['font'] = 9;
            $nameSize['left'] += 11.6;
            $nameSize['width'] += 1.5;//
            $nameSize['height'] = 6.3;
        }
        elseif($sizeLength == 14){
            $nameSize['font'] = 10;
            $nameSize['left'] += 12.2;
            $nameSize['width'] += 1.7;//
            $nameSize['height'] = 6.3;
        }
        elseif($sizeLength == 13){
            $nameSize['font'] = 10;
            $nameSize['left'] += 12.8;//
            $nameSize['width'] += 1.9;//
            $nameSize['height'] = 6.3;
        }
        elseif($sizeLength == 12){
            $nameSize['font'] = 10;
            $nameSize['left'] += 13.2;//
            $nameSize['width'] += 2.1;//
            $nameSize['height'] = 6.3;
        }
        elseif($sizeLength == 11){
            $nameSize['font'] = 10;
            $nameSize['left'] += 13.6;//
            $nameSize['width'] += 2.3;//
            $nameSize['height'] = 6.3;
        }
        elseif($sizeLength <= 10){
            $nameSize['font'] = 10;
            $nameSize['left'] += 14;//
            $nameSize['width'] += 2.5;//
            $nameSize['height'] = 6.3;
        }

        return $nameSize;
    }

    public function pisId($userid = null,$paper = null){
        $user = Personal_Information::where('userid','=',$userid)->first();
        $division['font'] = 19;
        $division['left'] = 3;
        $division['top'] = 79.5;
        if($user->division_id){
            if($user->division_id == 3){
                $division['left'] += 5;
                $division['desc'] = \PIS\Division::find($user->division_id)->description;
            }
            elseif($user->division_id == 4) {
                $division['desc'] = explode('LHSD - ', \PIS\Division::find($user->division_id)->description)[1];
            }
            elseif($user->division_id == 5) {
                $division['font'] -= 6.1;
                $division['left'] -= 1;
                $division['top'] +=1;
                $division['desc'] = explode('RLED - ', \PIS\Division::find($user->division_id)->description)[1];
            }
            elseif($user->division_id == 6)
                $division['desc'] =  explode('MSD - ',\PIS\Division::find($user->division_id)->description)[1];
        }
        else
            $division['desc'] = 'NO DIVISION';

        if($user->mname)
            $middleName = $user->mname[0].'.';
        else
            $middleName = '';
        $name = $user->fname.' '.$middleName.' '.$user->lname;
        //$name = substr($name, 0, 18);

        //return strlen($name);

        //strlen($name) = 31 DEFAULT formula

        if($paper == 'landscape'){
            $view = view('pis.pisId_landscape',[
                "name" => $name,
                "user" => $user,
                "division" => $division,
                "nameSize" => $this->nameSize(strlen($name)),
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
        $personal_information = Personal_Information::get();
        return view('welcome',[
            "personal_information" => $personal_information
        ]);
    }

    public function noPicture($type){

        if(strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https') {
            $protocol = "https://";
        }
        else {
            $protocol = "http://";
        }
        if(isset($_SERVER['SERVER_PORT'])){
            if($_SERVER['SERVER_PORT'] == '80'){
                $link = $protocol.$_SERVER['SERVER_NAME'].'/';
            } else {
                $link = $protocol.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/';
            }
        } else {
            $link = $protocol.$_SERVER['SERVER_NAME'];
        }
        $personal_information = Personal_Information::get();
        $data = [];
        foreach($personal_information as $row){
            $type == "picture" ? $columnType = $row->picture : $columnType = $row->signature;
            if(empty($columnType)){
                $data[] = $row->userid;
            } else {
                if(getimagesize($link.'pis/public/upload_picture/'.$type.'/'.$columnType))
                    continue;
                else
                    $data[] = $row->userid;
            }
        }

        return $data;

    }

}
