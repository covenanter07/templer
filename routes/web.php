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

// // Route::post('/','MilkController@create');
// Route::group(['middleware' => 'toast.boot'], function(){

//     Route::resource('milks','MilkController');
// });

Route::resource('milks','MilkController');
Route::resource('boxes','BoxController');
Route::resource('box-insides','BoxInsideController');
Route::post('signup','AuthController@signup');
Route::post('login','AuthController@login');
