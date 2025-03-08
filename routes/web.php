<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    $localName = 'Mohamed';
    $age = 30;
    $email = '1234@gmail.com';

    return view('test', [
        'name' => $localName,
        'age' => $age
    ]);
});
