<?php

namespace PIS\Http\Controllers;

use Illuminate\Http\Request;
use PIS\SalaryGrade;

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
            $tranche = $request->get('type');
        } else {
            $tranche = 'Second';
        }

        if ($tranche == 'Second'){
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

        $count_all = SalaryGrade::
        where('user_status','=','1')
            ->where(function($q) use ($keyword){
                $q->where('salary_tranche','like',"%$keyword%")
                    ->orWhere('salary_grade','like',"%$keyword%")
                    ->orWhere('salary_step','like',"%$keyword%")
                    ->orWhere('salary_amount','like',"%$keyword%");
            })->get();

        $countArray['ALL'] = count($count_all);

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

}
