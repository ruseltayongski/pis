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
        Schema::create('voluntary_work', function (Blueprint $table) {
            $table->increments('id');
            $table->text('userid')->nullable();
            $table->text('title_of_learning')->nullable();
            $table->text('date_from')->nullable();
            $table->text('date_to')->nullable();
            $table->text('number_of_hours')->nullable();
            $table->text('type_of_id')->nullable();
            $table->text('sponsored_by')->nullable();

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
