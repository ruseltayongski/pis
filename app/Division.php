<?php

namespace PIS;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $connection = 'dtsv3.0';
    protected $table = 'division';
    protected $primaryKey = 'id';
}
