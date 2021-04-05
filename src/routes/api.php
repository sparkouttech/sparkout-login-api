<?php

use Illuminate\Support\Facades\Route;



Route::post('user', 'Sparkout\SparkoutLogin\Controllers\LoginController@createAccount');
Route::post('user/login', 'Sparkout\SparkoutLogin\Controllers\LoginController@makeLogin');
Route::get('users', 'Sparkout\SparkoutLogin\Controllers\LoginController@getAllUsers');
