<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('henctr', function (Blueprint $table) {
            $table->string('enccode')->primary();
            $table->string('hpercode', 15);
            $table->datetime('encdate');
            $table->datetime('enctime');
            $table->string('toecode', 5)->default('OPD');

            $table->foreign('hpercode')->references('hpercode')->on('hperson');
        });

        Schema::create('hopdlog', function (Blueprint $table) {
            $table->string('enccode')->primary();
            $table->string('hpercode', 15);
            $table->datetime('opddate');
            $table->datetime('opdtime');
            $table->string('tacode', 5)->nullable();
            $table->string('tscode', 5)->nullable();
            $table->enum('opdstat', ['A', 'I'])->default('A');
            $table->enum('newold', ['O', 'N']);
            $table->integer('filling');
            $table->datetime('datetriage')->nullable();
            $table->double('patage', 5, 2);
            $table->double('patagemo', 2, 0);
            $table->double('patagedy', 2, 0);
            $table->string('disinstruc', 1)->nullable();

            $table->foreign('enccode')->references('enccode')->on('henctr');
            $table->foreign('hpercode')->references('hpercode')->on('hperson');
            $table->foreign('tscode')->references('tscode')->on('htypser');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hopdlog');
        Schema::dropIfExists('henctr');
    }
};
