<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCivilEligibility extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('civil_eligibility', function (Blueprint $table) {
            $table->increments('id');
            $table->text('userid')->nullable();
            $table->text('career_service')->nullable();
            $table->text('rating')->nullable();
            $table->text('date_of_examination')->nullable();
            $table->text('place_examination')->nullable();
            $table->text('license_number')->nullable();
            $table->text('date_of_validity')->nullable();

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
        Schema::drop("civil_eligibility");
    }
}
