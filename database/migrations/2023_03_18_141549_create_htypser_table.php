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
        Schema::create('htypser', function (Blueprint $table) {
            $table->string('tscode')->primary();
            $table->string('tsdesc');
            $table->enum('tsstat', ['A', 'I']);
            $table->string('tstype');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('htypser');
    }
};
