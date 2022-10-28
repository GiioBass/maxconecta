<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::resource('/movie', \App\Http\Controllers\MovieController::class);
Route::resource('/user', \App\Http\Controllers\UserController::class);

Route::get('{any}', function (){
    return view('home');
})->middleware(['auth']);
