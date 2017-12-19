<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userid',50)->unique();
            $table->text('picture')->nullable();
            $table->text('signature')->nullabe();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('mname')->nullable();
            $table->string('name_extension')->nullable();
            $table->string('position')->nullable();
            $table->text('date_of_birth')->nullable();
            $table->text('place_of_birth')->nullable();
            $table->text('sex')->nullable();
            $table->text('civil_status')->nullable();
            $table->text('citizenship')->nullable();
            $table->text('height')->nullable();
            $table->text('weight')->nullable();
            $table->text('blood_type')->nullable();
            $table->text('gsis_idno')->nullable();
            $table->text('gsis_polno')->nullable();
            $table->text('pag_ibigno')->nullable();
            $table->text('phicno')->nullable();
            $table->text('sssno')->nullable();
            $table->text('tin_no')->nullable();
            $table->text('residential_address')->nullable();
            $table->text('residential_municipality')->nullable();
            $table->text('residential_province')->nullable();
            $table->text('region_zip')->nullable();
            $table->text('telno')->nullable();
            $table->text('email_address')->nullable();
            $table->text('cellno')->nullable();
            $table->text('employee_status')->nullable();
            $table->text('job_status')->nullable();
            $table->text('inactive_area')->nullable();
            $table->text('case_name')->nullable();
            $table->text('case_address')->nullable();
            $table->text('case_contact')->nullable();
            $table->text('designation_id')->nullable();
            $table->text('division_id')->nullable();
            $table->text('section_id')->nullable();
            $table->text('remarks')->nullable();
            $table->text('disbursement_type')->nullable();
            $table->text('salary_charge')->nullable();
            $table->text('source_fund')->nullable();

            $table->text('user_status')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("personal_information");
    }
}
