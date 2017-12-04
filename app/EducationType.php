<?php

namespace PIS;

use Illuminate\Database\Eloquent\Model;

class EducationType extends Model
{
    protected $table = 'education_type';
    protected $primaryKey = 'id';

    protected $fillable = [
        'description',
        'user_status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
