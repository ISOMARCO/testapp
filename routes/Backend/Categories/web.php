<?php

use Illuminate\Support\Facades\Route;

Route::get('/categories', [App\Http\Controllers\Backend\Categories\CategoriesController::class, 'index'])->name('index');
