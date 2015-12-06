<?php

namespace App\Http\Controllers\Reservations;

use App\Libraries\Repositories\ReserveRoomRepository;
use App\Models\BookingRoomTypes;
use App\Models\Calendar;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ReserveRoomRepository $reserveRoomRepo)
    {

        $roomTypes = BookingRoomTypes::all();
        $firstRoomType = $roomTypes->last();

        $now = new \DateTime('now');
        $startdate = $request->get('startdate', $now->format('Y-m-d'));
        $enddate = $request->get('enddate', $now->add(new \DateInterval('P10D'))->format('Y-m-d'));
        $room_type_id = $request->get('room_type_id', $firstRoomType->room_type_id);

        $reservation = new Reservation();
        if ($request->has('reserve_code')) {
            $reserve_code = $request->get('reserve_code');
            $reservation = Reservation::where('reserve_code', $reserve_code)->get()->first();
        }

        $calendar = $reserveRoomRepo->findReserveRoomsByRangeAndRoomType($startdate, $enddate, $room_type_id);

        $dates = Calendar::getInclusiveDates($startdate, $enddate);
        $partners = Partner::all();

        $request->flash();

        $cardTypes = ['AMEX', 'JBC', 'Visa', 'Mastercard', 'BDO Card', 'Express Net', 'Megalink', 'BancNet', 'BPI'];
        return view('reservations.index', compact('calendar', 'roomTypes',
            'dates', 'startdate', 'enddate', 'reservation', 'partners', 'cardTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($door, $day)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
