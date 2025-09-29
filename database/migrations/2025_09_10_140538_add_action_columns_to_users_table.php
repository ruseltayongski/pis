<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActionColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personal_information', function (Blueprint $table) {
    $table->tinyInteger('action_status')->nullable()->comment('1 - inactive, 2 - resigned, 3 - retired');
    $table->date('action_date')->nullable();
});


     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('personal_information', function (Blueprint $table) {
            $table->dropColumn(['action_date', 'action_status']);
    });
    }
}
