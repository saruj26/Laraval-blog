<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    // return view('welcome');
    return "Welcome to Sarujanan Tutoral";
});


Route::get('/', function () {
    return "<h1> Hello world</h1>";
});

Route::get()