<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('frontend.welcome');
});

Route::get('/signin', function () {

    return view('frontend.signin');
});

Route::get('/signup', function () {

    return view('frontend.signup');
});

Route::get('/pricing', function () {

    return view('frontend.pricing');
});

Route::get('/forgot-password', function () {

    return view('frontend.forgot-password');
});
