<?php

namespace PIS;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $connection = 'dtsv3.0';
    protected $table = 'designation';
    protected $primaryKey = 'id';
}
