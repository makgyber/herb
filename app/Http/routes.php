<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
//    return view('welcome');
	if (Auth::user()) {
		return view('reservations.index');
	}
	return view('auth.login');
});




/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function ()
{
	Route::group(['prefix' => 'v1'], function ()
	{
		Route::get('reservation/detail/{id}', 'ReservedRoomDateAPIController@detail');

        require Config::get('generator.path_api_routes');
	});
});

/*
|--------------------------------------------------------------------------
| Auth routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function ()
{
	Route::get('login', 'AuthController@getLogin');
	Route::post('login', 'AuthController@postLogin');
	Route::get('logout', 'AuthController@getLogout');
});


/*
|--------------------------------------------------------------------------
| Reservations routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'reservations', 'namespace' => 'Reservations'], function(){

	Route::get('/', 'ReservationController@index');
	Route::get('new/{door}/{day}', 'ReservationController@create');
	Route::post('save', 'ReservationController@store');
	Route::get('guest', 'ReservationController@guest');

});

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
	Route::resource('folios', 'FolioController');

	Route::get('folios/{id}/delete', [
			'as' => 'admin.folios.delete',
			'uses' => 'FolioController@destroy',
	]);


	Route::resource('floors', 'FloorController');

	Route::get('floors/{id}/delete', [
			'as' => 'admin.floors.delete',
			'uses' => 'FloorController@destroy',
	]);


	Route::resource('discounts', 'DiscountController');

	Route::get('discounts/{id}/delete', [
			'as' => 'admin.discounts.delete',
			'uses' => 'DiscountController@destroy',
	]);


	Route::resource('rooms', 'RoomController');

	Route::get('rooms/{id}/delete', [
			'as' => 'admin.rooms.delete',
			'uses' => 'RoomController@destroy',
	]);


	Route::resource('rates', 'RateController');

	Route::get('rates/{id}/delete', [
			'as' => 'admin.rates.delete',
			'uses' => 'RateController@destroy',
	]);


	Route::resource('partners', 'PartnersController');

	Route::get('partners/{id}/delete', [
			'as' => 'admin.partners.delete',
			'uses' => 'PartnersController@destroy',
	]);


	Route::resource('occupancies', 'OccupancyController');

	Route::get('occupancies/{id}/delete', [
			'as' => 'admin.occupancies.delete',
			'uses' => 'OccupancyController@destroy',
	]);


	Route::resource('reservations', 'ReservationController');

	Route::get('reservations/{id}/delete', [
			'as' => 'admin.reservations.delete',
			'uses' => 'ReservationController@destroy',
	]);


	Route::resource('roomTypes', 'RoomTypesController');

	Route::get('roomTypes/{id}/delete', [
			'as' => 'roomTypes.delete',
			'uses' => 'RoomTypesController@destroy',
	]);


	Route::resource('reservedRoomDates', 'ReservedRoomDateController');

	Route::get('reservedRoomDates/{id}/delete', [
			'as' => 'reservedRoomDates.delete',
			'uses' => 'ReservedRoomDateController@destroy',
	]);


	Route::resource('bookingRoomTypes', 'BookingRoomTypesController');

	Route::get('bookingRoomTypes/{id}/delete', [
			'as' => 'bookingRoomTypes.delete',
			'uses' => 'BookingRoomTypesController@destroy',
	]);

	Route::resource('reserveRooms', 'ReserveRoomController');

	Route::get('reserveRooms/{id}/delete', [
			'as' => 'reserveRooms.delete',
			'uses' => 'ReserveRoomController@destroy',
	]);
});

/*
|--------------------------------------------------------------------------
| Frontdesk routes
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => 'frontdesk', 'namespace' => 'Frontdesk'], function(){

	Route::get('/', 'FrontdeskController@index');
	Route::get('/checkin/{door}', 'FrontdeskController@checkinform');
	Route::post('/checkin/{door}', 'FrontdeskController@checkin');
	Route::get('/checkout/{door}', 'FrontdeskController@checkoutform');
	Route::post('/checkout/{door}', 'FrontdeskController@checkout');
	Route::get('/transfer', 'FrontdeskController@transferform');
	Route::post('/transfer', 'FrontdeskController@transfer');

});














Route::resource('occupancyRooms', 'OccupancyRoomController');

Route::get('occupancyRooms/{id}/delete', [
    'as' => 'occupancyRooms.delete',
    'uses' => 'OccupancyRoomController@destroy',
]);


Route::resource('guests', 'GuestController');

Route::get('guests/{id}/delete', [
    'as' => 'guests.delete',
    'uses' => 'GuestController@destroy',
]);


Route::resource('partners', 'PartnerController');

Route::get('partners/{id}/delete', [
    'as' => 'partners.delete',
    'uses' => 'PartnerController@destroy',
]);


Route::resource('partnerTransactions', 'PartnerTransactionController');

Route::get('partnerTransactions/{id}/delete', [
    'as' => 'partnerTransactions.delete',
    'uses' => 'PartnerTransactionController@destroy',
]);


Route::resource('cardTypes', 'CardTypeController');

Route::get('cardTypes/{id}/delete', [
    'as' => 'cardTypes.delete',
    'uses' => 'CardTypeController@destroy',
]);


Route::resource('financeCharges', 'FinanceChargeController');

Route::get('financeCharges/{id}/delete', [
    'as' => 'financeCharges.delete',
    'uses' => 'FinanceChargeController@destroy',
]);


Route::resource('financeCharges', 'FinanceChargeController');

Route::get('financeCharges/{id}/delete', [
    'as' => 'financeCharges.delete',
    'uses' => 'FinanceChargeController@destroy',
]);


Route::resource('financeCharges', 'FinanceChargeController');

Route::get('financeCharges/{id}/delete', [
    'as' => 'financeCharges.delete',
    'uses' => 'FinanceChargeController@destroy',
]);


Route::resource('financeCharges', 'FinanceChargeController');

Route::get('financeCharges/{id}/delete', [
    'as' => 'financeCharges.delete',
    'uses' => 'FinanceChargeController@destroy',
]);


Route::resource('partnerDiscounts', 'PartnerDiscountController');

Route::get('partnerDiscounts/{id}/delete', [
    'as' => 'partnerDiscounts.delete',
    'uses' => 'PartnerDiscountController@destroy',
]);
