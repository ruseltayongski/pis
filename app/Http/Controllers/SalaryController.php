<?php

namespace PIS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PIS\SalaryGrade;
use Illuminate\Support\Facades\Session;

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

}
