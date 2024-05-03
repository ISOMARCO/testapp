<?php
use Illuminate\Support\Facades\Route;
use Modules\Backend\App\Http\RequestHandlers\Web\Auth\LoginRequestHandler;
Route::get('/login', LoginRequestHandler::class)->name('login');
