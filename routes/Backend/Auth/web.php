<?php
use Illuminate\Support\Facades\Route;
use App\Http\RequestHandlers\Backend\Web\Auth\LoginRequestHandler;

Route::get('/login', LoginRequestHandler::class)->name('login');
