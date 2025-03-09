<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [TestController::class, 'someAction']);

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::post('posts', [PostController::class, 'store'])->name('posts.store');

//1- change schema (create table , add column , remove column)
//2- query on database (select , insert , update , delete)
