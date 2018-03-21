<?php

namespace PIS;

use Illuminate\Database\Eloquent\Model;

class User_dtr extends Model
{
    protected $connection = 'dohdtr';
    protected $table = 'users';
    protected $primaryKey = 'id';
}
