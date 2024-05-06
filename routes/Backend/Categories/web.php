<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Categories\CategoriesController;

Route::get('/categories', [CategoriesController::class, 'index'])->name('index');
Route::post('/categories/update', [CategoriesController::class, 'updateRequest'])->name('update');
Route::post('/categories/create', [CategoriesController::class, 'createRequest'])->name('create');
