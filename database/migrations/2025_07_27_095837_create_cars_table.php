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
        Schema::create('cars', function (Blueprint $table) {
    $table->id();
    $table->string('vin')->nullable();
    $table->string('make');
    $table->string('model');
    $table->year('manufacture_year')->nullable();
    $table->unsignedTinyInteger('manufacture_month')->nullable();
    $table->string('color')->nullable();
    $table->string('transmission')->nullable();
    $table->string('engine_size')->nullable();
    $table->decimal('purchase_price_yuan', 10, 2)->nullable();
    $table->decimal('transport_cost_yuan', 10, 2)->nullable();
    $table->decimal('permit_cost_yuan', 10, 2)->nullable();
    $table->decimal('customs_tax_mnt', 15, 2)->nullable();
    $table->decimal('exchange_rate', 8, 2)->nullable();
    $table->decimal('total_cost_mnt', 15, 2)->nullable();
    $table->decimal('selling_price_mnt', 15, 2)->nullable();
    $table->enum('status', ['prepared', 'china_border', 'ub_arrived', 'sold'])->default('prepared');
    $table->date('ub_arrived_date')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
