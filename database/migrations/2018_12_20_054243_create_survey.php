<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurvey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('survey')){
            return true;
        }
        Schema::create('survey', function (Blueprint $table) {
            $table->increments('id');
            $table->text('userid')->nullable();
            $table->text('consanguinity_a')->nullable();
            $table->text('consanguinity_b')->nullable();
            $table->text('offense_a')->nullable();
            $table->text('offense_b')->nullable();
            $table->text('convicted')->nullable();
            $table->text('separated')->nullable();
            $table->text('government_a')->nullable();
            $table->text('government_b')->nullable();
            $table->text('immigrant')->nullable();
            $table->text('indigenous_a')->nullable();
            $table->text('indigenous_b')->nullable();
            $table->text('indigenous_c')->nullable();
            $table->text('reference_name_a')->nullable();
            $table->text('reference_name_b')->nullable();
            $table->text('reference_name_c')->nullable();
            $table->text('reference_address_a')->nullable();
            $table->text('reference_address_b')->nullable();
            $table->text('reference_address_c')->nullable();
            $table->text('reference_tel_a')->nullable();
            $table->text('reference_tel_b')->nullable();
            $table->text('reference_tel_c')->nullable();
            $table->text('government_id')->nullable();
            $table->text('passport_no')->nullable();
            $table->text('place_insurance')->nullable();
            $table->text('date_insurance')->nullable();

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
        Schema::drop('survey');
    }
}
