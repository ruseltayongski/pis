<?php

namespace PIS;
use Illuminate\Database\Eloquent\Model;
class Personal_Information extends Model
{
	protected $table = 'Personal_Information';
    protected $primaryKey = 'id';

    protected $fillable = [
        'userid',
        'picture',
        'fname',
        'lname',
        'mname',
        'name_extension',
        'position',
        'date_of_birth',
        'place_of_birth',
        'sex',
        'civil_status',
        'citizenship',
        'height',
        'weight',
        'blood_type',
        'gsis_idno',
        'gsis_polno',
        'pag_ibigno',
        'phicno',
        'sssno',
        'tin_no',
        'residential_address',

        "RHouseNo",
        "RStreet",
        "RSubdivision",
        "RBarangay",
        "RMunicipality",
        "RProvince",
        "RZip_code",

        "PHouseNo",
        "PStreet",
        "PSubdivision",
        "PBarangay",
        "PMunicipality",
        "PProvince",
        "PZip_code",

        'residential_municipality',
        'residential_province',
        'region_zip',
        'telno',
        'email_address',
        'cellno',
        'employee_status',
        'job_status',
        'inactive_area',
        'case_name',
        'case_address',
        'case_contact',
        'designation_id',
        'division_id',
        'section_id',
        'remarks',
        'disbursement_type',
        'salary_charge',
        'bbalance_cto',
        'sched',
        'user_status'
    ];

    protected $hidden = [
        'password','remember_token','created_at','updated_at',
    ];


}