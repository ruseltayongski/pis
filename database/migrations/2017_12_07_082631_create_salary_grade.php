<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaryGrade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('salary_grade')){
            return true;
        }
        Schema::create('salary_grade', function (Blueprint $table) {
            $table->increments('id');
            $table->text('salary_tranche')->nullable();
            $table->integer('salary_grade')->nullable();
            $table->integer('salary_step')->nullable();
            $table->decimal('salary_amount',8,2)->nullable();

            $table->text('status')->nullable();
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
        Schema::drop("salary_grade");
    }
}
