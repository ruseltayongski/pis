<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyBackground extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('family_background')){
            return true;
        }
        Schema::create('family_background', function (Blueprint $table) {
            $table->increments('id');
            $table->text('userid')->nullable();
            $table->text('sln')->nullable();
            $table->text('sfn')->nullable();
            $table->text('smn')->nullable();
            $table->text('sne')->nullable();
            $table->text('soccu')->nullable();
            $table->text('sbadd')->nullable();
            $table->text('stelno')->nullable();
            $table->text('fln')->nullable();
            $table->text('ffn')->nullable();
            $table->text('fmn')->nullable();
            $table->text('fne')->nullable();
            $table->text('mmln')->nullable();
            $table->text('ms')->nullable();
            $table->text('mfn')->nullable();
            $table->text('mmn')->nullable();

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
        Schema::drop("family_background");
    }
}
