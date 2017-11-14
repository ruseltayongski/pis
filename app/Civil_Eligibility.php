<?php

namespace PIS;

use Illuminate\Database\Eloquent\Model;

class Civil_Eligibility extends Model
{
    protected $table = 'civil_eligibility';
    protected $primaryKey = 'id';

    protected $fillable = [
        'userid',
        'career_service',
        'rating',
        'date_of_examination',
        'place_examination',
        'license_number',
        'date_of_validity',
        'unique_row',
    ];

    protected $hidden = [
        'remember_token',
    ];

}
