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

/* Autoload data from database and to be displayed in the main menu*/

Route::get('/', 'DisplayRouteController@index', function () {
     return view('home');
});
Route::post('/fetch', 'DisplayRouteController@fetch')->name('index.fetch');

Route::get('contact', function () {
    return view('contact');
});

/* Search bar such as searching for Origin, Destination, Date, Time and etc. */
use busplannersystem\Seat;
use busplannersystem\Trip;
use Illuminate\Support\Facades\Input;
Route::any ('/home', function () {
	$p = Request::input ( 'search_origin' );
	$q = Request::input ( 'search_destination' );
	$r = Request::input ( 'search_date' );

	$seat = Seat::whereHas('trip', function($trip) use ($r)
    {
		$trip->where('date_depart','LIKE','%'.$r.'%');
		
	})->whereHas('route', function($route) use ($p, $q)
    {
		$route->where('origin_terminal','LIKE','%'.$p.'%')->where('destination_terminal','LIKE','%'.$q.'%');
		
	})->get();	

	
	if (count ( $seat ) > 0 )
        return view ( 'home' )->withDetails ( $seat )->withQuery ( $p );
    else
        return view ( 'home' )->withMessage ( 'No Details found. Try to search again !' );
} );

/* verify customer email */
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

/* customer booking records */
Route::get('customer/records', 'TicketController@index_customer');
Route::get('/downloadPDF/{id}','TicketController@downloadPDF');



/* For admin */
Route::group(['prefix' => 'admin'], function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');

	Route::get('/registration', 'Auth\AdminRegistrationController@showRegistrationForm')->name('admin.registration');
	Route::post('/registration', 'Auth\AdminRegistrationController@register')->name('admin.registration.submit');

	//Admin approve application form
	Route::get('/list-of-operators','ApplicationFormController@update')->name('admin.operatorList');
	Route::get('/view-new-operator-application','ApplicationFormController@index')->name('admin.viewApplicationForm');
	Route::get('/application-forms/{application_forms}','ApplicationFormController@show')->name('admin.approveApplicationForm');
	Route::post('/application-forms/{application_forms}','ApplicationFormController@create_operator')->name('admin.createOperator');

	Route::get('/insert-new-terminal','TerminalController@index')->name('admin.insertTerminal');
	Route::post('/insert-new-terminal','TerminalController@store')->name('admin.insertTerminal.submit');

	Route::get('/insert-ads-info','AdvertisementController@index')->name('admin.insertAds');
	Route::post('/insert-ads-info','AdvertisementController@store')->name('admin.insertAds.submit');
	Route::get('/ads','AdvertisementController@update')->name('admin.showAds');

	

});


/* For operator */
Route::group(['prefix' => 'operator','middleware' =>'operator'], function()
{
	Route::get('/new-application', 'ApplicationFormController@create')->name('operator.application.show');
	Route::post('/new-application', 'ApplicationFormController@store')->name('operator.application.submit');

	
	// Route::get('/home', 'OperatorController@index')->name('operator.dashboard'); 	

									
									/* Admin register operator */
	 Route::get('/registration', 'Auth\OperatorRegistrationController@showRegistrationForm')->name('operator.registration');
	 Route::post('/registration', 'Auth\OperatorRegistrationController@register')->name('operator.registration.submit');

						/* Operator wants to sign up the application form */
	// Route::get('/operator-application','OperatorController@showApplicationForm')->name('operator.application');
	// Route::post('/operator-application','OperatorController@create')->name('operator.applicaition.submit');
	
	//Operator Insert Bus Info
	Route::get('/insert-bus-info', 'BusController@index')->name('operator.insertBusInfo');
	Route::post('/insert-bus-info', 'BusController@store')->name('operator.insertBusInfo.submit');
	Route::get('/view-bus-info', 'BusController@indexView')->name('operator.viewBusInfo');

	//Operator Insert Driver
	Route::get('/insert-driver', 'DriverController@index')->name('operator.insert-driver');
	Route::post('/insert-driver', 'DriverController@store')->name('operator.insert-driver.submit');

	//Operator edit bus
	Route::get('/bus/{bus}/edit','BusController@edit')->name('bus.edit');
	Route::get('/bus/{bus}','BusController@destroy')->name('bus.destroy');
	Route::patch('/bus/{bus}','BusController@update')->name('bus.update');

	//Operator edit driver
	Route::get('/driver/{driver}/edit','DriverController@edit')->name('driver.edit');
	Route::get('/driver/{driver}','DriverController@destroy')->name('driver.destroy');
	Route::patch('/driver/{driver}','DriverController@update')->name('driver.update');

	//Operator edit trip
	Route::get('/trip/{trip}/edit','TripController@edit')->name('trip.edit');
	Route::get('/trip/{trip}','TripController@destroy')->name('trip.destroy');
	Route::patch('/trip/{trip}','TripController@update')->name('trip.update');

	//Operator Insert Route Info
	Route::get('/insert-route-info', 'RouteController@index')->name('operator.insertRouteInfo');
	Route::post('/insert-route-info', 'RouteController@store')->name('operator.insertRouteInfo.submit');

	//Operator insert trip info
	Route::get('/insert-trip-info', 'TripController@index')->name('operator.insertTripInfo');
	Route::post('/insert-trip-info', 'TripController@store')->name('operator.insertTripInfo.submit');
	//Route::post('/insert-trip-info/fetch', 'TripController@fetch')->name('dynamicdependent.fetch');

	//Operator Insert Dynamic Dependant
	// Route::get('/insert-dynamic-trip', 'DynamicDependantController@index')->name('operator.insertDynamicDependant');
	// Route::get('/insert-dynamic-trip/fetch', 'DynamicDependantController@fetch')->name('dynamicdependent.fetch');
	Route::post('/insert-dynamic-trip', 'DynamicDependant@store')->name('operator.insertDynamicDependant');

	//Operator insert ajax dynamic
	Route::get('/myform', 'DynamicDependantController@myform')->name('operator.insertDynamicDependant');
	Route::get('myform/ajax/{id}', 'DynamicDependantController@myformAjax')->name('dynamicdependent.ajax');

	// Chart // Chart // Chart // Chart // Chart // Chart // Chart //
	//Operator view line chart for popular date(month)
	Route::get('/popular_date_line_chart', 'LaravelGoogleGraph@index_popular_date_line_chart');
	
	//Operator view donut chart for popular destination
	Route::get('/popular_destination_donut_chart', 'LaravelGoogleGraph@index_popular_destination_donut_chart');
	Route::get('/report', 'HomeController@operator_report');

	//Operator view financial report
	Route::get('/financial-report-dashboard', 'FinancialAnalyticsController@index')->name('operator.view_financial_dashboard');
	Route::post('/annual-report', 'FinancialAnalyticsController@annual_report')->name('operator.insert_year_report');

	





	

}); // grouped by operator. Easier to read


// For bus controller //Syazany: 
//Route::resource('bus', 'BusController');




//seat
Route::get('/seatlist/{ID}','CreateSeatController@index')->middleware('auth');
// Route::post('/seatlist/choose/{id}','CreateSeatController@edit') -> id('edit');
Route::post('/seatlist/pay','CreateSeatController@edit')->middleware('auth');
//ticket
Route::post('/ticket','CreateSeatController@store');
// Route::post('/seatlist/ticket','CreateSeatController@home'); **
Route::post('/schedule','CreateSeatController@show');
//schedule

Route::get('/schedule','CreateSeatController@show')->middleware('auth');
Route::get('/showticket/{id}','CreateSeatController@showticket')->middleware('auth');

// Route::get('/schedule','CreateSeatController@show')->middleware('auth');  **
// google-api chart for bus companies
Route::get('/laravel_google_chart', 'LaravelGoogleGraph@index');



//DAH TAK PAKAI:
// Route::get('/payment', function () {
//     return view('payment');
// });
Route::get('/createseat/{ID}','BookSeatController@index')->name('operator.createSeatInfo');
Route::post('/createseat/created','BookSeatController@create');

// Route::resource('/ticket', 'TicketController'); // For ticket controller


?>