<?php

Route::get('/', function () {
  return view('authentication/login');
});

//Login routes
Route::get('/login', 'LoginController@login');
Route::post('/login', 'LoginController@postLogin');

Route::get('/logout', 'LoginController@logout');

Route::get('/restricted', 'AdminController@restricted');


//Admin routes
Route::group(['middleware' => 'admin'], function(){
  Route::resource('admin', 'AdminController');
  Route::resource('menu', 'MenuController');
  // Route::get('/registered-guests', 'AdminController@registeredGuests');
  Route::get('/register', 'RegistrationController@register');
  Route::post('/register', 'RegistrationController@store');
});

//Guests controller routes
// Route::group(['middleware' => 'guest'], function(){
  Route::post('/store', 'GuestController@store');
  Route::get('/todays-menu', 'GuestController@create');
  Route::get('/my-account', 'GuestController@myAccount');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index');
