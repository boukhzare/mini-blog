<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {return view('auth.register');})->name('register');
Route::get('/login', function () {return view('auth.login');})->name('login');
Route::get('/home', function () { return view('layouts.app'); })->name('home');


// actions

Route::post('/register',[UserController::class , 'register'])->name('register.post');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');



