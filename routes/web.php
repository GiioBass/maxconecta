<?php

use Illuminate\Support\Facades\Route;



//Auth::routes();

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/movie', \App\Http\Controllers\MovieController::class);
Route::resource('/user', \App\Http\Controllers\UserController::class);

Route::get('{any}', function (){
    return view('layouts.app');
});
