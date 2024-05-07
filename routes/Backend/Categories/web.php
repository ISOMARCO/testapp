<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Categories\CategoriesController;

Route::get('/categories', [CategoriesController::class, 'index'])->name('index')->middleware('auth');
Route::post('/categories/update', [CategoriesController::class, 'updateRequest'])->name('update')->middleware('auth');
Route::post('/categories/create', [CategoriesController::class, 'createRequest'])->name('create')->middleware('auth');
