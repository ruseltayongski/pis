<?php

namespace PIS;

use Illuminate\Database\Eloquent\Model;

class Work_Experience extends Model
{
    protected $table = 'work_experience';
    protected $primaryKey = 'id';

    protected $fillable = [
        'userid',
        'date_from',
        'date_to',
        'position_title',
        'company',
        'monthly_salary',
        'monthly_salary_private',
        'salary_grade',
        'status_of_appointment',
        'government_service',
        'unique_row',
        'user_status'
    ];

    protected $hidden = [
        'remember_token',
    ];
}
