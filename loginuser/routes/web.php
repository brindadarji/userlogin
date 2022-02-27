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
    return view('welcome');
});

Route::get('/registration', function () {
    return view('registration');
});
Route::get('/login', function () {
    return view('login');
});


Route::get('/dashboard', 'loginController@dashBoard');
Route::post('/register_user', 'loginController@registerUser')->name('register_user');
Route::post('/login_user', 'loginController@loginUser')->name('login_user');
Route::get('/logout', 'loginController@logOut');
