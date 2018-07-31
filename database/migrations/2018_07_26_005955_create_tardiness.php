<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTardiness extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tardiness', function (Blueprint $table) {
            $table->increments('id');
            $table->text('userid');
            $table->text('name');
            $table->text('position');
            $table->text('division');
            $table->text('section');
            $table->text('employee_status');
            $table->text('year');
            $table->text('month');
            $table->text('tardiness_min');
            $table->text('tardiness_day');

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
        Schema::drop('tardiness');
    }
}
