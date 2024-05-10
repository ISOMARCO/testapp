<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Departments\DepartmentsController;

Route::get('/departments', [DepartmentsController::class, 'index'])->name('index')->middleware('auth');
Route::post('/departments/create', [DepartmentsController::class, 'createRequest'])->name('create')->middleware('auth');
Route::post('/departments/update', [DepartmentsController::class, 'updateRequest'])->name('update')->middleware('auth');
Route::post('/departments/delete', [DepartmentsController::class, 'deleteRequest'])->name('delete')->middleware('auth');
