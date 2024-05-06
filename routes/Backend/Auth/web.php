<?php

use App\Http\Controllers\Backend\Auth\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/loginRequest', [LoginController::class, 'loginRequest'])->name('loginRequest');
Route::get('/admin/logout', [App\Http\Controllers\Backend\Auth\LoginController::class, 'logout'])->name('logout');
