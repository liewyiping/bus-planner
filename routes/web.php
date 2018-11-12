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
    return view('index');
});

Route::get('contact', function () {
    return view('contact');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* For operator and customer */
Route::get('/operator',function(){
	return view('/operator');
})->middleware('auth','operator');

Route::get('/customer',function(){
	return view('/home');
})->middleware('auth','customer');

/* For admin */
Route::group(['prefix' => 'admin'], function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');

});

Route::get('/seatlist/{ID}','BookSeatController@index');


Route::get('/seatlist/create','BookSeatController@create');

Route::post('/seatlist','BookSeatController@store');



/* For operator */
Route::group(['prefix' => 'operator'], function()
{
	Route::get('/new-application', 'ApplicationFormController@create')->name('operator.application.show');
	Route::post('/new-application', 'ApplicationFormController@store')->name('operator.application.submit');

	Route::get('/login', 'Auth\OperatorLoginController@showLoginForm')->name('operator.login');
	Route::post('/login', 'Auth\OperatorLoginController@login')->name('operator.login.submit');
	Route::get('/home', 'OperatorController@index')->name('operator.dashboard'); 	
									
									/* Admin register operator */
	 Route::get('/registration', 'Auth\OperatorRegistrationController@showRegistrationForm')->name('operator.registration');
	 Route::post('/registration', 'Auth\OperatorRegistrationController@register')->name('operator.registration.submit');

						/* Operator wants to sign up the application form */
	// Route::get('/operator-application','OperatorController@showApplicationForm')->name('operator.application');
	// Route::post('/operator-application','OperatorController@create')->name('operator.applicaition.submit');
	
	Route::get('/insert-bus-info', 'BusController@index')->name('operator.insertBusInfo');
	Route::post('/insert-bus-info', 'BusController@store')->name('operator.insertBusInfo.submit');
}); // grouped by operator. Easier to read


    




Route::resource('/ticket', 'TicketController');


