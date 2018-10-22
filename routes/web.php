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

/* For admin */
Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');

});

Route::get('/seatlist/{ID}','BookSeatController@index');


Route::get('/seatlist/create','BookSeatController@create');

Route::post('/seatlist','BookSeatController@store');



/* For operator */
Route::prefix('operator')->group(function(){
	Route::get('/login', 'Auth\OperatorLoginController@showLoginForm')->name('operator.login');
	Route::post('/login', 'Auth\OperatorLoginController@login')->name('operator.login.submit');
	Route::get('/home', 'OperatorController@index')->name('operator.dashboard'); //using name route easier for maintenance 
	Route::get('/registration', 'Auth\OperatorRegistrationController@showRegistrationForm')->name('operator.registration');
	Route::post('/registration', 'Auth\OperatorRegistrationController@register')->name('operator.registration.submit');

}); // grouped by operator. Easier to read


