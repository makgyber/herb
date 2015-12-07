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

Route::resource("occupancyRooms", "OccupancyRoomAPIController");

Route::resource("occupancyRooms", "OccupancyRoomAPIController");

Route::resource("guests", "GuestAPIController");

Route::resource("partners", "PartnerAPIController");

Route::resource("partnerTransactions", "PartnerTransactionAPIController");

Route::resource("cardTypes", "CardTypeAPIController");

Route::resource("financeCharges", "FinanceChargeAPIController");

Route::resource("financeCharges", "FinanceChargeAPIController");

Route::resource("financeCharges", "FinanceChargeAPIController");

Route::resource("financeCharges", "FinanceChargeAPIController");

Route::resource("partnerDiscounts", "PartnerDiscountAPIController");