<?php

Route::get('/', function () {
  return view('authentication/login');
});

//Login routes
Route::get('/login', 'LoginController@login');
Route::post('/login', 'LoginController@postLogin');
Route::get('/logout', 'LoginController@logout');
Route::get('/restricted', 'AdminController@restricted');

Route::get('/forgot-password', 'ForgotPasswordController@forgotPassword');
Route::post('/forgot-password', 'ForgotPasswordController@postforgotPassword');



//Admin routes
Route::group(['middleware' => 'admin'], function(){
  // Route::get('/registered-guests', 'AdminController@registeredGuests');
  Route::get('/register', 'RegistrationController@register');
  Route::post('/register', 'RegistrationController@store');

  Route::resource('admin', 'AdminController');
  Route::resource('menu', 'MenuController');
  Route::get('/transactions', 'TransactionController@index');
});

//Guests controller routes
// Route::group(['middleware' => 'guest'], function(){
  Route::resource('guests', 'GuestController');
  Route::post('/storeBreakfast', 'GuestController@storeBreakfast');
  Route::post('/storeBreakfastTmrw', 'GuestController@storeBreakfastTmrw');
  Route::post('/storeDinner', 'GuestController@storeDinner');
  Route::post('/storeDinnerTmrw', 'GuestController@storeDinnerTmrw');
  Route::get('/my-account', 'GuestController@myAccount');

  Route::get('/my-calendar', 'CalendarController@calendar');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index');
