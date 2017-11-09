<?php

namespace PIS;

use Illuminate\Database\Eloquent\Model;

class Family_Background extends Model
{
    protected $table = 'family_background';
    protected $primaryKey = 'userid';


    protected $fillable = [
        'userid',
        'sln',
        'sfn',
        'smn',
        'sne',
        'soccu',
        'sbadd',
        'stelno',
        'fln',
        'ffn',
        'fmn',
        'fne',
        'mmln',
        'mfn',
        'mmn',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
