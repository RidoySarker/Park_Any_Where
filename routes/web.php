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
Route::get('/parking_zone', 'HomeController@ParkingZone');
Route::get('/pricelist/{id}', 'HomeController@pricelist');
Route::get('/periodprice/{id}', 'HomeController@periodprice');
Route::get('/vehicleperiod/{id}/{parking_name}', 'BookingController@vehicleperiod');
Route::get('/vehicleprice/{id}', 'BookingController@vehicleprice');

Route::resource('/rentuser-parkingzone', 'RentUserController');

Route::resource('/booking', 'BookingController')->middleware('auth');
Route::resource('/uservehicle', 'UserVehicleController');
Route::post('/bookingvehicle', 'BookingController@booking');
Route::get('/confiramation/{id}', 'BookingController@Confiramation');

Route::get('/booking-history', 'ProfileController@bookinghistory');

Auth::routes();

Route::get('/admin', 'AdminController@index');
Route::get('/myprofile', 'ProfileController@myprofile');

Route::get('/admin/login', 'AdminController@adminLogin');

Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {

        Route::group(['middleware' => ['role:Supper Admin']], function () {
    
            Route::resource('/role', 'RoleController');

            Route::resource('/permission', 'PermissionController');

            Route::resource('/role-permission', 'RolePermissionController');

            Route::resource('/user-access', 'UserAccessController');

        });

        Route::group(['middleware' => ['role:Supper Admin|Admin','permission:Vehicle|ParkingPrice|ZoneLocation|PaymentMethod|AppSettings']], function () {
            
            Route::resource('/vehicle', 'VehicleController');

            Route::resource('/payment_method', 'PaymentMethodController');

            Route::resource('/appsettings', 'AppSettingsController');

            Route::resource('/parkingprice', 'ParkingPriceController');

            Route::resource('/locationzone', 'LocationZoneController');

        });

        Route::resource('/profile', 'ProfileController');

        Route::get('pass', 'ProfileController@checkpass')->name('pass');

        Route::resource('/parkingzone', 'ParkingZoneController');

        Route::get('/parkingzone/vehicle_data/{id}', 'ParkingZoneController@vehicle_data');

        Route::get('/parkingzone/package_data/{id}', 'ParkingZoneController@package_data');
        //Booking List
        Route::get('/booking_list', 'BookingController@booking_list');
        //Booking Release
        Route::get('/booking_release/{id}', 'BookingController@booking_release');
        //Active Booking
        Route::get('/active-booking', 'BookingController@activebooking');
        //Today Booking
        Route::get('/today-booking', 'BookingController@todaybooking');

    });
});

Route::get('/verifyemail/{token}', 'HomeController@verifyemail')->name('verifyemail');

Route::resource('/customer_register', 'CustomerController');

Route::post("/customer_login", "CustomerController@login");

Route::get("/rent_register", "CustomerController@rent_register");
