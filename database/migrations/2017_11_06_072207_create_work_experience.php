<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkExperience extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_experience', function (Blueprint $table) {
            $table->increments('id');
            $table->text('userid')->nullable();
            $table->text('date_from')->nullable();
            $table->text('date_to')->nullable();
            $table->text('position_title')->nullable();
            $table->text('company')->nullable();
            $table->text('monthly_salary')->nullable();
            $table->text('salary_grade')->nullable();
            $table->text('status_of_appointment')->nullable();
            $table->text('government_service')->nullable();
            $table->text('unique_row')->nullable();

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
        Schema::drop("work_experience");
    }
}
