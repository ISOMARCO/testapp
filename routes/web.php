<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/admin', [App\Http\Controllers\Backend\Home\HomeController::class, 'index'])->name('Backend.home');
Route::get('/admin/logout', [App\Http\Controllers\Backend\Auth\LoginController::class, 'logout'])->name('Backend.logout');
