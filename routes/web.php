<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RepairRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('requests.index');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/requests', [RepairRequestController::class, 'index'])->name('requests.index');
    Route::get('/requests/create', [RepairRequestController::class, 'create'])->name('requests.create');
    Route::post('/requests', [RepairRequestController::class, 'store'])->name('requests.store');
    Route::delete('/requests/{id}', [RepairRequestController::class, 'destroy'])->name('requests.destroy');

    Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
    Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/requests/{id}/update-date', [AdminController::class, 'updateDate'])->name('admin.updateDate');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';