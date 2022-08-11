<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('deals', function (Blueprint $table) {
        //     $table->unsignedBigInteger('employee_id');
        //     $table->foreign('employee_id')->references('id')->on('employees');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('deals', function (Blueprint $table) {
        //     $table->dropForeign(['employee_id']);
        // });
    }
};
