<?php

namespace PIS;

use Illuminate\Database\Eloquent\Model;

class User_dts extends Model
{
    protected $connection = 'dts';
    protected $table = 'users';
    protected $primaryKey = 'id';

}
