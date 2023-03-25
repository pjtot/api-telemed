<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hpersonal', function (Blueprint $table) {
            $table->string('employeeid')->primary();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('postitle')->nullable();
            $table->string('deptcode')->nullable();

            $table->foreign('deptcode')->references('tscode')->on('htypser');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('employeeid')->nullable();
            $table->foreign('employeeid')->references('employeeid')->on('hpersonal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['employeeid']);
            $table->dropColumn('employeeid');
        });

        Schema::dropIfExists('hpersonal');
    }
};
