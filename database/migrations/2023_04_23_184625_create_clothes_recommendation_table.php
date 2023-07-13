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
        Schema::create('clothes_recommendation', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('clothes_id')->references('id')->on('clothes');
            $table->foreignId('recommendation_id')->references('id')->on('recommendations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clothes_recommendation');
    }
};
