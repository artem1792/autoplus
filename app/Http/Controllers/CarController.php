<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reg_number' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
        ]);

        Car::create([
            'user_id' => Auth::id(),
            'reg_number' => $request->reg_number,
            'model' => $request->model,
            'brand' => $request->brand,
        ]);

        return redirect()->route('requests.index')->with('success', 'Автомобиль добавлен!');
    }
}
