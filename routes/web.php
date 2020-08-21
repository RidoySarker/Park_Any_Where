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
Route::get('/pricelist/{id}', 'HomeController@pricelist');
Route::get('/periodprice/{id}', 'HomeController@periodprice');
Route::get('/vehicleperiod/{id}', 'BookingController@vehicleperiod');
Route::get('/vehicleprice/{id}/{booking_id}', 'BookingController@vehicleprice');

Route::resource('/booking', 'BookingController');

Auth::routes();

Route::get('/admin', 'AdminController@index');

Route::get('/admin/login', 'AdminController@adminLogin');

Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::resource('/vehicle', 'VehicleController');

        Route::resource('/profile', 'ProfileController');


        Route::resource('/package', 'PackagesController');

        Route::resource('/parkingzone', 'ParkingZoneController');

        Route::resource('/parkingprice', 'ParkingPriceController');

        Route::resource('/payment_method', 'PaymentMethodController');

        Route::resource('/locationzone', 'LocationZoneController');

        Route::resource('/appsettings', 'AppSettingsController');

        Route::get('/parkingzone/vehicle_data/{id}', 'ParkingZoneController@vehicle_data');
        Route::get('/parkingzone/package_data/{id}', 'ParkingZoneController@package_data');
    });
});

Route::get('/verifyemail/{token}', 'HomeController@verifyemail')->name('verifyemail');

Route::resource('/customer_register', 'CustomerController');
Route::post("/customer_login", "CustomerController@login");
Route::get("/rent_register", "CustomerController@rent_register");
