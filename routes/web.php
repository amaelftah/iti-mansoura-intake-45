<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PostController;
use App\Http\Middleware\AdminsOnly;
use App\Models\Post;

Route::middleware(['auth', 'admins-only'])->get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::middleware(['auth'])->get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::middleware(['auth'])->get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::middleware(['auth'])->post('posts', [PostController::class, 'store'])->name('posts.store');


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'name' => 'Mohamed',
        'posts' => Post::all(),
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
