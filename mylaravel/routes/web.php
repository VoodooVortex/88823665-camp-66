<?php

use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Route;

Route::post(
    '/mycontroller',
    [MyController::class, 'myFunction']
);

Route::get(
    '/mycontroller',
    [MyController::class, 'myFunction']
);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});
