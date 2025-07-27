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
       Schema::create('sales', function (Blueprint $table) {
    $table->id();
    $table->foreignId('car_id')->constrained('cars')->cascadeOnDelete();
    $table->string('buyer_name');
    $table->string('phone')->nullable();
    $table->string('register_no')->nullable();
    $table->decimal('final_price_mnt', 15, 2);
    $table->date('sold_date');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
