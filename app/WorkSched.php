<?php

namespace PIS;

use Illuminate\Database\Eloquent\Model;

class WorkSched extends Model
{
    protected $connection = 'dohdtr';
    protected $table = 'work_sched';
    protected $primaryKey = 'id';
}
