<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoluntaryWork extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('voluntary_work')){
            return true;
        }
        Schema::create('voluntary_work', function (Blueprint $table) {
            $table->increments('id');
            $table->text('userid')->nullable();
            $table->text('name_of_organization')->nullable();
            $table->text('date_from')->nullable();
            $table->text('date_to')->nullable();
            $table->text('number_of_hours')->nullable();
            $table->text('nature_of_work')->nullable();
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
        Schema::drop("voluntary_work");
    }
}
