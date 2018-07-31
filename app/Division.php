<?php

namespace PIS;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $connection = 'dts';
    protected $table = 'division';
    protected $primaryKey = 'id';
}
