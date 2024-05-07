<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Customers\CustomersController;

Route::get('/customers', [CustomersController::class, 'index'])->name('index')->middleware('auth');
Route::post('/customers/create', [CustomersController::class, 'createRequest'])->name('create')->middleware('auth');
