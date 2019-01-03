<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildren extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('children')){
            return true;
        }
        Schema::create('children',function($table){
            $table->increments('id');
            $table->text('userid')->nullable();
            $table->text('name')->nullable();
            $table->text('date_of_birth')->nullable();
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
        Schema::drop('children');
    }
}
