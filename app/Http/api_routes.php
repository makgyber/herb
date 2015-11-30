<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/





Route::resource("folios", "FolioAPIController");

Route::resource("floors", "FloorAPIController");

Route::resource("discounts", "DiscountAPIController");

Route::resource("rooms", "RoomAPIController");

Route::resource("rates", "RateAPIController");

Route::resource("partners", "PartnersAPIController");

Route::resource("occupancies", "OccupancyAPIController");

Route::resource("reservations", "ReservationAPIController");

Route::resource("roomTypes", "RoomTypesAPIController");

Route::resource("reservedRoomDates", "ReservedRoomDateAPIController");

Route::resource("reservedRoomDates", "ReservedRoomDateAPIController");

Route::resource("bookingRoomTypes", "BookingRoomTypesAPIController");

Route::resource("reserveRooms", "ReserveRoomAPIController");