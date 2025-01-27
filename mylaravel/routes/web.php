<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Route;


Route::get(
    '/login',
    [LoginController::class, 'index']
);

Route::get(
    'register',
    [RegisterController::class, 'index']
);

Route::get(
    '/home',
    [HomeController::class, 'index']
);

Route::get(
    '/',
    [HomeController::class, 'index']
);

Route::post(
    '/mycontroller',
    [MyController::class, 'myFunction']
);

Route::get(
    '/mycontroller',
    [MyController::class, 'myFunction']
);

Route::get(
    '/hello',
    fn() => view('hello')
);
