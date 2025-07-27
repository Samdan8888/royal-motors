<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'vin',
        'make',
        'model',
        'manufacture_year',
        'manufacture_month',
        'color',
        'transmission',
        'engine_size',
        'purchase_price_yuan',
        'transport_cost_yuan',
        'permit_cost_yuan',
        'customs_tax_mnt',
        'exchange_rate',
        'total_cost_mnt',
        'selling_price_mnt',
        'status',
        'ub_arrived_date',
    ];
}
