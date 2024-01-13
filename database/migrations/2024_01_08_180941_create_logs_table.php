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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 255)->default(null);
            $table->string('text', 255)->default(null);
            $table->longText('data')->default(null);
            $table->string('isread', 255)->default(null);
            $table->string('icon', 255)->default(null);
            $table->string('color', 255)->default(null);
            $table->string('type', 255)->default(null);
            $table->string('date', 255)->default(null);
            $table->string('owner', 255)->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
