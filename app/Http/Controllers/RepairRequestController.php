<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\RepairRequest;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepairRequestController extends Controller
{
    public function index()
    {
        $requests = RepairRequest::with(['car', 'status'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('requests.index', compact('requests'));
    }

    public function create()
    {
        $cars = Car::where('user_id', Auth::id())->get();
        
        if ($cars->isEmpty()) {
            return redirect()->route('cars.create')->with('error', 'Сначала добавьте хотя бы один автомобиль!');
        }

        return view('requests.create', compact('cars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'description' => 'required|string|min:10',
        ]);

        $status = Status::where('name', 'На рассмотрении')->first();

        RepairRequest::create([
            'user_id' => Auth::id(),
            'car_id' => $request->car_id,
            'description' => $request->description,
            'status_id' => $status->id,
        ]);

        return redirect()->route('requests.index')->with('success', 'Заявка успешно подана!');
    }

    public function destroy($id)
    {
        $request = RepairRequest::where('user_id', Auth::id())->findOrFail($id);
        $request->delete();

        return redirect()->route('requests.index')->with('success', 'Заявка удалена!');
    }
}