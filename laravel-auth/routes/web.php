<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registration',function(){
    return view('registration');
});

Route::post('/registration',[UserController::class,'register'])->name('registration');

Route::get('/login',function(){
    return view('login');
});

Route::post('/login',[UserController::class,'login'])->name('login');

Route::get('/home',function(){
    return view('home');
});
