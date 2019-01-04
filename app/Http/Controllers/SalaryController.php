<?php

namespace PIS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PIS\SalaryGrade;
use Illuminate\Support\Facades\Session;
use PIS\Work_Experience;

class SalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function salaryList(Request $request){
        Session::put('keyword',$request->input('keyword'));
        $keyword = Session::get('keyword');
        if($request->get('tranches')){
            $tranche = $request->get('tranches');
        } else {
            $tranche = 'All';
        }

        if($tranche == 'All'){
            $salary_grade = SalaryGrade::
            where('status','=','1')
                ->where(function($q) use ($keyword){
                    $q->where('salary_tranche','like',"%$keyword%")
                        ->orWhere('salary_grade','like',"%$keyword%")
                        ->orWhere('salary_step','like',"%$keyword%")
                        ->orWhere('salary_amount','like',"%$keyword%");
                })
                ->orderBy('salary_tranche','asc')
                ->paginate(10);
        }
        else if ($tranche == 'Second'){
            $salary_grade = SalaryGrade::
            where('salary_tranche','=','Second')
            ->where('status','=','1')
                ->where(function($q) use ($keyword){
                    $q->where('salary_tranche','like',"%$keyword%")
                        ->orWhere('salary_grade','like',"%$keyword%")
                        ->orWhere('salary_step','like',"%$keyword%")
                        ->orWhere('salary_amount','like',"%$keyword%");
                })
                ->orderBy('salary_tranche','asc')
                ->paginate(10);
        }
        else if ($tranche == 'Third'){
            $salary_grade = SalaryGrade::
            where('salary_tranche','=','Third')
                ->where('status','=','1')
                ->where(function($q) use ($keyword){
                    $q->where('salary_tranche','like',"%$keyword%")
                        ->orWhere('salary_grade','like',"%$keyword%")
                        ->orWhere('salary_step','like',"%$keyword%")
                        ->orWhere('salary_amount','like',"%$keyword%");
                })
                ->orderBy('salary_tranche','asc')
                ->paginate(10);
        }
        else if ($tranche == 'Fourth'){
            $salary_grade = SalaryGrade::
            where('salary_tranche','=','Fourth')
                ->where('status','=','1')
                ->where(function($q) use ($keyword){
                    $q->where('salary_tranche','like',"%$keyword%")
                        ->orWhere('salary_grade','like',"%$keyword%")
                        ->orWhere('salary_step','like',"%$keyword%")
                        ->orWhere('salary_amount','like',"%$keyword%");
                })
                ->orderBy('salary_tranche','asc')
                ->paginate(10);
        }

        $count_all = SalaryGrade::where('status','=','1')->get();
        $count_second = SalaryGrade::where('status','=','1')->where('salary_tranche','=','Second')->get();
        $count_third = SalaryGrade::where('status','=','1')->where('salary_tranche','=','Third')->get();
        $count_fourth = SalaryGrade::where('status','=','1')->where('salary_tranche','=','Fourth')->get();

        $countArray['All'] = count($count_all);
        $countArray['Second'] = count($count_second);
        $countArray['Third'] = count($count_third);
        $countArray['Fourth'] = count($count_fourth);

        if ($request->isMethod('post')) {
            return response()->json([
                "view" => view('salary.salaryPagination', [
                    "salary_grade" => $salary_grade,
                    "tranche" => $tranche
                ])->render(),
                "count_all" => count($count_all),
                "countArray" => $countArray
            ]);
        }

        return view('salary.salaryList',[
            "salary_grade" => $salary_grade,
            "tranche" => $tranche,
            "count_all" => count($count_all),
            "countArray" => $countArray
        ]);
    }

    public function salaryAdd(Request $request){
        SalaryGrade::create([
            "salary_tranche" => $request->salary_tranche,
            "salary_grade" => $request->salary_grade,
            "salary_step" => $request->salary_step,
            "salary_amount" => $request->salary_amount,
            "status" => "1"
        ]);

        return Redirect::back()->with('salaryAdd', 'Successfully Added New User');
    }

    public function salaryForm(Request $request){
        return view('salary.salaryForm');
    }

    public function salaryDelete(Request $request){
        return SalaryGrade::where('id','=',$request->id)->update([
           "status" => 0
        ]);
    }

    public function salaryGrade(){
        return view('append.salaryGrade');
    }

    public function upgradeSalaryTranche($currentTranche,$upgradeTranche){
        $work_experience = Work_Experience::where('date_to','=','Present')
                        ->where("salary_grade","like","%$currentTranche%")
                        ->where(DB::raw('length(userid)'),">=","6")
                        ->get();

        $salary_grade = [];
        foreach($work_experience as $row){
            $salary_grade[] = [
                "userid" => $row->userid,
                "salary_tranche" => $upgradeTranche,
                "salary_grade" => explode('-',explode(' | ',$row->salary_grade)[1])[0],
                "salary_step" => explode('-',explode(' | ',$row->salary_grade)[1])[1]
            ];
        }

        $count = 0;
        foreach($salary_grade as $row){
            $monthly_salary = SalaryGrade::where('salary_tranche','=',$row['salary_tranche'])
                        ->where('salary_grade','=',$row['salary_grade'])
                        ->where('salary_step','=',$row['salary_step'])
                        ->first()
                        ->salary_amount;

            if($userUpgradeTranche = Work_Experience::where('userid','=',$row['userid'])
                            ->where('date_to','=','Present')
                            ->first()){
                $userUpgradeTranche->update([
                    'salary_grade' => $row['salary_tranche'].' | '.$row['salary_grade'].'-'.$row['salary_step'],
                    'monthly_salary' => $monthly_salary
                ]);
                $count++;
            }
        }

        return $count.' Employees successfully upgrade the salary tranche';
    }

}
