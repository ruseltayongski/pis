<?php

namespace PIS;

use Illuminate\Database\Eloquent\Model;

class Educational_Background extends Model
{
    protected $table = 'educational_background';
    protected $primaryKey = 'id';

    protected $fillable = [
        'userid',
        'level',
        'name_of_school',
        'degree_course',
        'poa_from',
        'poa_to',
        'units_earned',
        'year_graduated',
        'scholarship',
        'unique_row',
        'user_status'
    ];

    protected $hidden = [
        'remember_token',
    ];

}
