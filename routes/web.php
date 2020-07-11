<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index');

Route::resource('/vehicle', 'VehicleController');
Route::get('vehicle/create', 'VehicleController@create');
Route::post('vehicle/store', 'VehicleController@store');
Route::post('vehicle/update', 'VehicleController@update');
Route::get('vehicle/show/{id}', 'VehicleController@show');

Route::resource('/profile', 'ProfileController');
Route::post('profile/store', 'ProfileController@store');
Route::get('profile/pass', 'ProfileController@show');