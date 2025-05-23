<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('other_information')){
            return true;
        }
        Schema::create('other_information', function (Blueprint $table) {
            $table->increments('id');
            $table->text('userid')->nullable();
            $table->text('special_skills')->nullable();
            $table->text('recognition')->nullable();
            $table->text('organization')->nullable();
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
        Schema::drop("other_information");
    }
}
