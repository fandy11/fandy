<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */
Route::group(array('prefix' => 'admin', 'before' => 'check'), function() {
// main page for the admin section (app/views/admin/dashboard.blade.php)
    Route::resource('location', 'LocationController');
    Route::resource('extra', 'ExtraController');
    Route::resource('car', 'CarController');
    Route::resource('reservation', 'ReservationController');
    Route::resource('user', 'UsersController');
    Route::resource('settings', 'SettingsController');
    Route::post('settings/payment', array('as' => 'admin.payment.store', 'uses' => 'SettingsController@payment_store'));
    Route::post('settings/rental', array('as' => 'admin.rental.store', 'uses' => 'SettingsController@rental_store'));
    Route::get('type/create', array('as' => 'admin.type.create', 'uses' => 'ExtraController@type_create'));
    Route::post('type/store', array('as' => 'admin.type.store', 'uses' => 'ExtraController@store_type'));
    Route::get('type/{id}/edit', array('as' => 'admin.type.edit', 'uses' => 'ExtraController@edit_type'));
    Route::put('type/{id}', array('as' => 'admin.type.update', 'uses' => 'ExtraController@update_type'));
    Route::post('bulk_action', array('as' => 'bulk_loc', 'uses' => 'LocationController@bulk_action'));
    Route::post('bulk_action_extra', array('as' => 'bulk_extra', 'uses' => 'ExtraController@bulk_extra'));
    Route::post('bulk_action_type', array('as' => 'bulk_type', 'uses' => 'ExtraController@bulk_type'));
    Route::post('bulk_action_car', array('as' => 'bulk_car', 'uses' => 'CarController@bulk_car'));
    Route::get('cek_email', array('as' => 'cek_email', 'uses' => 'UsersController@cekEmail'));
});
Route::get('admin', array('as'=>'admin','before' => 'check', 'uses' => 'BaseController@dashBoard'));
Route::get('login', 'UsersController@login');
Route::post('login', array('https' => false, 'before' => 'csrf', 'as' => 'postuserlogin', 'uses' => 'UsersController@doLogin'));
Route::get('logout', array('as' => 'frontlogout', 'uses' => 'UsersController@logout'));
Route::group(array('prefix' => 'api'), function() {
// main page for the admin section (app/views/admin/dashboard.blade.php)
    Route::get('location', array('as' => 'api.location', 'uses' => 'LocationController@getLoc'));
    Route::get('extra', array('as' => 'api.extra', 'uses' => 'ExtraController@getExtra'));
    Route::get('type', array('as' => 'api.type', 'uses' => 'ExtraController@getType'));
    Route::get('car', array('as' => 'api.car', 'uses' => 'CarController@getCar'));
    Route::get('user', array('as' => 'api.user', 'uses' => 'UsersController@getUsers'));
    Route::get('reservation', array('as' => 'api.reservation', 'uses' => 'ReservationController@getReservation'));
});
Route::get('car', array('as' => 'car', 'uses' => 'ReservationController@getCarByType'));
Route::post('price', array('as' => 'price', 'uses' => 'ReservationController@getPrice'));
Route::put('price', array('as' => 'price', 'uses' => 'ReservationController@getPrice'));
Route::get('/', function() {
    return View::make('front.layouts.index');
});
Route::get('home', array('as' => 'home', 'uses' => 'FrontController@getHome'));
Route::get('choosecar', array('as' => 'choosecar', 'uses' => 'FrontController@getCar'));
Route::post('choosecar', array('as' => 'choosecar', 'uses' => 'FrontController@getCar'));
Route::post('selectcar', array('as' => 'selectcar', 'uses' => 'FrontController@selectCar'));
Route::get('selectcar', array('as' => 'selectcar', 'uses' => 'FrontController@selectCar'));
Route::post('detailcustomer', array('as' => 'detailcustomer', 'uses' => 'FrontController@detailCustomer'));
Route::post('payment', array('as' => 'payment', 'uses' => 'FrontController@payment'));
