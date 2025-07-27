@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Машин бүртгэх</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('cars.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block">Үйлдвэрлэгч (Make)</label>
            <input type="text" name="make" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block">Загвар (Model)</label>
            <input type="text" name="model" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block">Үйлдвэрлэсэн он</label>
            <input type="number" name="manufacture_year" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Үйлдвэрлэсэн сар</label>
            <input type="number" name="manufacture_month" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Өнгө</label>
            <input type="text" name="color" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">VIN дугаар</label>
            <input type="text" name="vin" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Хурдны хайрцаг</label>
            <input type="text" name="transmission" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Моторын багтаамж</label>
            <input type="text" name="engine_size" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Худалдан авалтын үнэ (юань)</label>
            <input type="number" step="0.01" name="purchase_price_yuan" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Тээврийн зардал (юань)</label>
            <input type="number" step="0.01" name="transport_cost_yuan" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Хятадын хил дээрх бичиг, зардал (юань)</label>
            <input type="number" step="0.01" name="permit_cost_yuan" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Монголын татвар (₮)</label>
            <input type="number" name="customs_tax_mnt" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Зарах үнэ (₮)</label>
            <input type="number" name="selling_price_mnt" class="w-full border p-2 rounded">
        </div>

        <input type="hidden" name="status" value="prepared">

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Хадгалах</button>
    </form>
</div>
@endsection
