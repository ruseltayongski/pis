<?php

namespace PIS;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $connection = 'dtsv3.0';
    protected $table = 'section';
    protected $primaryKey = 'id';
}
