<?php

namespace PIS;

use Illuminate\Database\Eloquent\Model;

class Other_Information extends Model
{
    protected $table = 'other_information';
    protected $primaryKey = 'id';

    protected $fillable = [
        'userid',
        'special_skills',
        'recognition',
        'organization',
        'unique_row',
        'user_status'
    ];

    protected $hidden = [
        'remember_token',
    ];
}
