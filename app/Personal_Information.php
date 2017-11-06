<?php

namespace PIS;
use Illuminate\Database\Eloquent\Model;
class Personal_Information extends Model
{
	protected $table = 'Personal_Information';
    protected $primaryKey = 'id';
    protected  $hidden = ['id'];
}