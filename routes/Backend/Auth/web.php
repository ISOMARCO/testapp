<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\LoginController;


Route::get('/login', [LoginController::class, 'index'])->name('login');
