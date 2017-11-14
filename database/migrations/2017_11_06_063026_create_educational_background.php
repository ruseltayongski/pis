<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationalBackground extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_background', function (Blueprint $table) {
            $table->increments('id');
            $table->text('userid')->nullable();
            $table->text('level')->nullable();
            $table->text('name_of_school')->nullable();
            $table->text('degree_course')->nullable();
            $table->text('poa_from')->nullable();
            $table->text('poa_to')->nullable();
            $table->text('units_earned')->nullable();
            $table->text('year_graduated')->nullable();
            $table->text('scholarship')->nullable();
            $table->text('unique_row')->nullable();

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
        Schema::drop("educational_background");
    }
}
