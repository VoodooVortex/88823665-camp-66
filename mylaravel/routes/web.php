<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\test;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogin;
use App\Http\Controllers\YokController;


Route::get(
    '/login',
    [LoginController::class, 'index']
);

Route::post(
    '/login',
    [LoginController::class, 'login']
);

Route::middleware([CheckLogin::class])->group(function () {

    Route::get(
        '/test',
        [test::class, 'index']
    );

    Route::post(
        '/test',
        [test::class, 'add']
    );

    Route::get(
        '/display-test',
        [test::class, 'display']
    );

    Route::get(
        '/display-test/{id}',
        [test::class, 'edit']
    );

    Route::put(
        '/display-test',
        [test::class, 'edit_action']
    );

    Route::delete(
        '/test',
        [test::class, 'delete']
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
        '/product',
        [ProductController::class, 'index']
    );

    Route::post(
        '/product',
        [ProductController::class, 'add_product']
    );
    Route::delete(
        '/product',
        [ProductController::class, 'delete']
    );



    //ya luem sai tong khang bon
    Route::get(
        '/yok',
        [YokController::class, 'index']
    );

    Route::post(
        '/yok',
        [YokController::class, 'add']
    );

    Route::delete(
        '/yok',
        [YokController::class, 'delete']
    );
});







Route::get(
    '/',
    [HomeController::class, 'index']
)->middleware([CheckLogin::class]);

Route::get(
    '/home',
    [HomeController::class, 'index']
)->middleware([CheckLogin::class]);

Route::get(
    '/logout',
    function () {
        session()->forget('user');
        session()->flush();
        return redirect('/login');
    }
);

Route::get(
    '/register',
    [RegisterController::class, 'index']
);

Route::post(
    '/register',
    [RegisterController::class, 'create']
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
