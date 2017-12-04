<?php

namespace PIS;

use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    protected $table = 'children';
    protected $primaryKey = 'id';

    protected $fillable = [
        'userid',
        'name',
        'date_of_birth',
        'user_status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
