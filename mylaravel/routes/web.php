<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get(
    '/login',
    [LoginController::class, 'index']
);

Route::get(
    '/register',
    [RegisterController::class, 'index']
);

Route::post(
    '/register',
    [RegisterController::class, 'create']
);

Route::get(
    '/users',
    [UserController::class, 'index']
);

Route::get(
    '/user/{id}',
    [UserController::class, 'edit']
);

Route::put(
    '/user',
    [UserController::class, 'edit_action']
);

Route::delete(
    '/user',
    [UserController::class, 'delete_user']
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
