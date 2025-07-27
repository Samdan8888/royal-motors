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
        Schema::create('marketing', function (Blueprint $table) {
    $table->id();
    $table->foreignId('car_id')->constrained('cars')->cascadeOnDelete();
    $table->boolean('washed')->default(false);
    $table->boolean('photo_taken')->default(false);
    $table->boolean('video_made')->default(false);
    $table->boolean('fb_posted')->default(false);
    $table->boolean('boosted')->default(false);
    $table->decimal('boost_amount_usd', 10, 2)->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketing');
    }
};
