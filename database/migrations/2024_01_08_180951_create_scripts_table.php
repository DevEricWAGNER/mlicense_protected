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
        Schema::create('scripts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('script', 100)->nullable(false);
            $table->longText('webhook')->nullable(false);
            $table->string('status', 200)->nullable(false)->default('user');
            $table->string('variables', 200)->nullable(true)->default('user');
            $table->foreignId('owner')->constrained('users')->nullable(false);
            $table->longText('serverside')->nullable(true)->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scripts');
    }
};
