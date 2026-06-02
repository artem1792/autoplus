<?php

namespace App\Http\Controllers;

use App\Models\RepairRequest;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $requests = RepairRequest::with(['user', 'car', 'status'])->latest()->get();
        $statuses = Status::all();

        return view('admin.index', compact('requests', 'statuses'));
    }

    public function updateDate(Request $request, $id)
    {
        $request->validate([
            'planned_date' => 'required|date',
            'status_id' => 'required|exists:statuses,id'
        ]);

        $repairRequest = RepairRequest::findOrFail($id);
        $repairRequest->planned_date = $request->planned_date;
        $repairRequest->status_id = $request->status_id;
        $repairRequest->save();

        return back()->with('success', 'Дата и статус успешно обновлены!');
    }
}
