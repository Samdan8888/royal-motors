<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::orderBy('created_at', 'desc')->get();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'make' => 'required|string',
        'model' => 'required|string',
    ]);

    $data = $request->all();
    $data['status'] = 'prepared'; // default төлөв

    Car::create($data);

    return redirect()->route('cars.index')->with('success', 'Машин амжилттай бүртгэгдлээ!');
}

    public function updateStatus(Request $request, Car $car)
    {
    $statuses = ['prepared', 'china_border', 'mongolia_border', 'ub_arrived', 'sold'];
    $currentIndex = array_search($car->status, $statuses);

    if ($currentIndex !== false && $currentIndex < count($statuses) - 1) {
        $nextStatus = $statuses[$currentIndex + 1];

        // Шинэ өгөгдлүүдийг хадгалах
        $car->fill($request->only([
            'permit_cost_yuan',
            'customs_tax_mnt',
            'selling_price_mnt',
        ]));

        // Хяналт: дараагийн шатанд шаардлагатай утгууд байна уу?
        if ($nextStatus === 'china_border' && empty($car->permit_cost_yuan)) {
            return back()->with('error', 'Хятадын хил дээр ирэхийн тулд бичиг, зардлын мэдээллийг оруулна уу.');
        }
        if ($nextStatus === 'mongolia_border' && empty($car->customs_tax_mnt)) {
            return back()->with('error', 'Монгол татварын мэдээлэл дутуу байна.');
        }
        if ($nextStatus === 'ub_arrived' && empty($car->selling_price_mnt)) {
            return back()->with('error', 'Зарах үнийг оруулсны дараа УБ-д ирсэн төлөвт оруулна уу.');
        }

        $car->status = $nextStatus;
        $car->save();
    }

    return redirect()->back()->with('success', 'Төлөв шинэчлэгдлээ!');
}
}