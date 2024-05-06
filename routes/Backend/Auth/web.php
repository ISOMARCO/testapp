<?php

use App\Http\Controllers\Backend\Auth\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/loginRequest', [LoginController::class, 'loginRequest'])->name('loginRequest')->middleware('guest');
Route::get('/logout', [App\Http\Controllers\Backend\Auth\LoginController::class, 'logout'])->name('logout')->middleware('auth');
