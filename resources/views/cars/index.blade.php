@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Татан авалтын жагсаалт</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('cars.create') }}" class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block">+ Машин нэмэх</a>

    <div class="overflow-x-auto">
        <table class="w-full border text-left text-sm">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2">#</th>
                    <th class="p-2">Make</th>
                    <th class="p-2">Model</th>
                    <th class="p-2">VIN</th>
                    <th class="p-2">Үйлдвэрлэсэн огноо</th>
                    <th class="p-2">Өнгө</th>
                    <th class="p-2">Үнэ (¥)</th>
                    <th class="p-2">Тээвэр (¥)</th>
                    <th class="p-2">Бичиг (¥)</th>
                    <th class="p-2">Татвар (₮)</th>
                    <th class="p-2">Зарах үнэ (₮)</th>
                    <th class="p-2">Төлөв</th>
                    <th class="p-2">Үйлдэл</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-2">{{ $car->id }}</td>
                        <td class="p-2">{{ $car->make }}</td>
                        <td class="p-2">{{ $car->model }}</td>
                        <td class="p-2">{{ $car->vin }}</td>
                        <td class="p-2">{{ $car->manufacture_year }}-{{ $car->manufacture_month }}</td>
                        <td class="p-2">{{ $car->color }}</td>
                        <td class="p-2">{{ $car->purchase_price_yuan }}</td>
                        <td class="p-2">{{ $car->transport_cost_yuan }}</td>
                        <td class="p-2">{{ $car->permit_cost_yuan }}</td>
                        <td class="p-2">{{ $car->customs_tax_mnt }}</td>
                        <td class="p-2">{{ $car->selling_price_mnt }}</td>
                        <td class="p-2"> @php
                                        $statusLabels = [
            'prepared' => 'Бэлтгэгдсэн',
            'china_border' => 'Хятад хил дээр',
            'ub_arrived' => 'УБ-д ирсэн',
            'sold' => 'Зарагдсан',
        ];
    @endphp
    {{ $statusLabels[$car->status] ?? $car->status }}</td>
                        <td class="p-2">
    @if($car->status === 'mongolia_border')
        @include('cars.partials.ub_arrived_modal', ['car' => $car])
    @elseif($car->status !== 'sold')
        <form action="{{ route('cars.status', $car) }}" method="POST">
            @csrf
            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">→ Шинэчлэх</button>
        </form>
    @else
        <span class="text-gray-500">Зарагдсан</span>
    @endif
</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
