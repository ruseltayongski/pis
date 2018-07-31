<?php

namespace PIS;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $connection = 'dts';
    protected $table = 'designation';
    protected $primaryKey = 'id';
}
