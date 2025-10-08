<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActionColumnsToUsersTableIncaseEmergency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personal_information', function (Blueprint $table) {
           $table->string('ice_name')->nullable();
            $table->string('ice_address')->nullable();
            $table->string('ice_contact_no')->nullable();
            $table->boolean('ice_donate_organ')->default(false);
            $table->string('ice_specific_organ')->nullable();
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
            $table->dropColumn([
                'ice_name',
                'ice_address',
                'ice_contact_no',
                'ice_donate_organ',
                'ice_specific_organ',
            ]);
        });
    }
}
