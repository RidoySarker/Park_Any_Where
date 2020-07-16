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
    return view('frontend.home');
})->name('home');

Auth::routes();

Route::get('/admin', 'AdminController@index');

Route::prefix('admin')->group(function (){
    Route::middleware('auth')->group(function (){
        Route::resource('/vehicle', 'VehicleController');
        Route::get('/vehicle/create', 'VehicleController@create');
        Route::post('/vehicle/store', 'VehicleController@store');
        Route::post('/vehicle/update', 'VehicleController@update');
        Route::get('/vehicle/show/{id}', 'VehicleController@show');

        Route::resource('/profile', 'ProfileController');
        Route::post('profile/store', 'ProfileController@store');
        Route::get('profile/pass', 'ProfileController@show');
    });
});


