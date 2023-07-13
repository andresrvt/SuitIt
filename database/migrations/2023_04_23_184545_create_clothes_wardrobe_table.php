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
        Schema::create('clothes_wardrobe', function (Blueprint $table) {
            $table->id();
            $table->integer('uses_number')->default(0);
            $table->integer('quantity')->default(1);
            $table->foreignId('clothes_id')->references('id')->on('clothes');
            $table->foreignId('wardrobe_id')->references('id')->on('wardrobes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clothes_wardrobe');
    }
};
