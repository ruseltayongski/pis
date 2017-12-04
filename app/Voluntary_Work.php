<?php

namespace PIS;

use Illuminate\Database\Eloquent\Model;

class Voluntary_Work extends Model
{
    protected $table = 'voluntary_work';
    protected $primaryKey = 'id';

    protected $fillable = [
        'userid',
        'name_of_organization',
        'date_from',
        'date_to',
        'number_of_hours',
        'type_of_id',
        'nature_of_work',
        'unique_row',
        'user_status'
    ];

    protected $hidden = [
        'remember_token',
    ];

}
