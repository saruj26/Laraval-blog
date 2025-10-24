<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    // return view('welcome');
    return "Welcome to Sarujanan Tutoral";
});


Route::get('/', [PostController::class, 'index']);

Route::get('/post/{id}', [PostController::class, 'detail'])->where('id', '[0-9]+')->name('post.detail');

Route::get('/old-url', [PostController::class, 'oldUrl']);

Route::get('/new-something-url', [PostController::class, 'newUrl'])->name('new_url');