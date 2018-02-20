<?php

namespace PIS;

use Illuminate\Database\Eloquent\Model;

class User_dts extends Model
{
    protected $connection = 'dtsv3.0';
    protected $table = 'users';
    protected $primaryKey = 'id';

}
