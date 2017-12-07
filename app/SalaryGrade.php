<?php

namespace PIS;

use Illuminate\Database\Eloquent\Model;

class SalaryGrade extends Model
{
    protected $table = 'salary_grade';
    protected $primaryKey = 'id';

    protected $fillable = [
        'salary_tranche',
        'salary_grade',
        'salary_step',
        'salary_amount',
        'status'
    ];

    protected $hidden = [
        'remember_token',
    ];
}
