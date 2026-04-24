<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;

// Auth pages
Route::get('/', function () { return view('auth.register'); })->name('register');
Route::get('/login', function () { return view('auth.login'); })->name('login');

// Home with posts
Route::get('/home', function () {
    $posts = \App\Models\Post::with('user')->latest()->get();
    return view('home', compact('posts'));
})->name('home');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/my-posts', [PostController::class, 'myPosts'])->name('posts.mine');

// Authentication actions
Route::post('/register', [UserController::class, 'register'])->name('register.post');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Posts actions
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');


// like action
Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])->name('posts.like');