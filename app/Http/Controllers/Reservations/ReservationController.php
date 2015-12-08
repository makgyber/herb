<?php

namespace App\Http\Controllers\Reservations;

use App\Libraries\Repositories\ReserveRoomRepository;
use App\Models\BookingRoomTypes;
use App\Models\Calendar;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\Partner;
use App\Models\PartnerTransaction;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $all = $request->all();

        $now = date('Y-m-d H:i:s');
        $reservecode = (isset($all['reserve_code']) && trim($all['reserve_code']) != '') ? $all['reserve_code'] : Reservation::generateReserveCode();

        $reservation = [
            "guest_id" => $all['guest_id'],
            "reserve_date" => $all['reserve_date'],
            "Partner" => $all['partner'],
            "pax" => $all['pax'],
            "pickup_time" => $all['pickup_time'],
            "pickup_location" => $all['pickup_location'],
            "notes" => $all['notes'],
            "reserve_fee" => $all['reserve_fee'],
            "card_type" => $all['cardType'],
            "date_created" => $now,
            "date_updated" => $now,
            "batch_number" => $all['batch_number'],
            "is_debit" => isset($all['is_debit']) ? 1 : 0,
            "card_suffix" => $all['card_suffix'],
            "multi_entry_approver" => ""
        ];

        $res = Reservation::find($reservecode);

        if ($res->exists) {
            Reservation::find($reservecode)->update($reservation);
        } else {
            $reservation['reserve_code'] = $reservecode;
            Reservation::create($reservation);
        }


        $partnerTrxn = [
            "booking_number" => $all['booking_number'],
            "payable" => $all['commission'],
            "transaction_date" => $all['reserve_date'],
            "reserve_code" => $reservecode,
            "result_status" => 'Confirmed',
            "receivable" => '0.00',
            "partner_name" => $all['partner'],
            "remarks" => $all['remarks']
        ];

        $pt = PartnerTransaction::where(['reserve_code' => $reservecode])->get()->first();
        if ($pt->exists) {
            $pt->update($partnerTrxn);
        } else {
            PartnerTransaction::create($partnerTrxn);
        }


        return redirect('reservations' . '?reserve_code=' . $reservecode)->with('status', 'Reservation data saved');
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

    public function guest(Request $request)
    {
        $fn = $request->get('firstname');
        $ln = $request->get('lastname');

        $guest = Guest::firstOrCreate(['firstname' => $fn, 'lastname' => $ln]);

        return response()->json($guest);

    }
}
