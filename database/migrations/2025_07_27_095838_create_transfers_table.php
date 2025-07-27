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
        Schema::create('transfers', function (Blueprint $table) {
    $table->id();
    $table->foreignId('car_id')->nullable()->constrained('cars')->nullOnDelete();
    $table->enum('transfer_to', ['dajun', 'manjaa']);
    $table->decimal('amount_yuan', 12, 2);
    $table->decimal('exchange_rate', 8, 2);
    $table->decimal('amount_mnt', 15, 2);
    $table->date('transfer_date');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
