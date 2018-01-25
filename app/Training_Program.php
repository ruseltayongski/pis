<?php

namespace PIS;

use Illuminate\Database\Eloquent\Model;

class Training_Program extends Model
{
    protected $table = 'training_program';
    protected $primaryKey = 'id';

    protected $fillable = [
        'userid',
        'certificate',
        'title_of_learning',
        'date_from',
        'date_to',
        'number_of_hours',
        'type_of_id',
        'sponsored_by',
        'unique_row',
        'user_status'
    ];

    protected $hidden = [
        'remember_token',
    ];
}
