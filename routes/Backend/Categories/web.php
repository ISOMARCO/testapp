<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Categories\CategoriesController;

Route::get('/categories', [CategoriesController::class, 'index'])->name('index');
Route::post('/categories/update/{category}', [CategoriesController::class, 'updateRequest'])->name('update');
