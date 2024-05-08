<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Departments\DepartmentsController;

Route::get('/departments', [DepartmentsController::class, 'index'])->name('index')->middleware('auth');
