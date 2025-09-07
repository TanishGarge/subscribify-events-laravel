<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function() { return "Admin"; })->middleware(['auth','admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/plan', [PlanController::class, 'index'])->name('plan');
    Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('subscribe');
    Route::put('/subscribe/{subscription}', [SubscriptionController::class, 'update'])->name('subscribe.update');

    Route::get('/events', [EventController::class, 'index'])->name('event-list');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('event-details');
});

require __DIR__.'/auth.php';
