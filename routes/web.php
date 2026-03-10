<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/default', function () {
    return view('layout.default');
});



Route::get('/subject', function () {
    return view('admin.subject');
});


Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/personal-details', function () {
    return view('user.personal-details');
});
