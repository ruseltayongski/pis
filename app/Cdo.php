<?php

namespace PIS;

use Illuminate\Database\Eloquent\Model;

class Cdo extends Model
{
    protected $connection = 'dohdtr';
    protected $table = 'cdo';
    protected $primaryKey = 'id';
}
