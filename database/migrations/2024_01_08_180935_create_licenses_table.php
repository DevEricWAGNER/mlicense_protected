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
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 255)->nullable(false);
            $table->string('script', 100)->nullable(false);
            $table->string('ip', 200)->nullable(false);
            $table->string('status', 200)->nullable(false);
            $table->string('variables', 255)->nullable(true);
            $table->foreignId('owner')->constrained('users')->nullable(false);
            $table->string('deadline', 200)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licenses');
    }
};
