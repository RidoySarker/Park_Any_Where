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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/admin', 'AdminController@index');

Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::resource('/vehicle', 'VehicleController');

        Route::resource('/profile', 'ProfileController');
        Route::post('profile/store', 'ProfileController@store');
        Route::get('profile/pass', 'ProfileController@show');

        Route::resource('/package', 'PackagesController');

        Route::resource('/parkingzone', 'ParkingZoneController');

        Route::resource('/payment_method', 'PaymentMethodController');

        Route::resource('/locationzone', 'LocationZoneController');

        Route::resource('/appsettings', 'AppSettingsController');

        Route::get('/parkingzone/vehicle_data/{id}', 'ParkingZoneController@vehicle_data');
        Route::get('/parkingzone/package_data/{id}', 'ParkingZoneController@package_data');
    });
});

Route::get('/verifyemail/{token}', 'HomeController@verifyemail')->name('verifyemail');
