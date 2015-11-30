<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ReservationRepository;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ReservationAPIController extends AppBaseController
{
	/** @var  ReservationRepository */
	private $reservationRepository;

	function __construct(ReservationRepository $reservationRepo)
	{
		$this->reservationRepository = $reservationRepo;
	}

	/**
	 * Display a listing of the Reservation.
	 * GET|HEAD /reservations
	 *
	 * @return Response
	 */
	public function index()
	{
		$reservations = $this->reservationRepository->all();

		return $this->sendResponse($reservations->toArray(), "Reservations retrieved successfully");
	}

	/**
	 * Show the form for creating a new Reservation.
	 * GET|HEAD /reservations/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Reservation in storage.
	 * POST /reservations
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Reservation::$rules) > 0)
			$this->validateRequestOrFail($request, Reservation::$rules);

		$input = $request->all();

		$reservations = $this->reservationRepository->create($input);

		return $this->sendResponse($reservations->toArray(), "Reservation saved successfully");
	}

	/**
	 * Display the specified Reservation.
	 * GET|HEAD /reservations/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$reservation = $this->reservationRepository->apiFindOrFail($id);

		return $this->sendResponse($reservation->toArray(), "Reservation retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Reservation.
	 * GET|HEAD /reservations/{id}/edit
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		// maybe, you can return a template for JS
//		Errors::throwHttpExceptionWithCode(Errors::EDITION_FORM_NOT_EXISTS, ['id' => $id], static::getHATEOAS(['%id' => $id]));
	}

	/**
	 * Update the specified Reservation in storage.
	 * PUT/PATCH /reservations/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Reservation $reservation */
		$reservation = $this->reservationRepository->apiFindOrFail($id);

		$result = $this->reservationRepository->updateRich($input, $id);

		$reservation = $reservation->fresh();

		return $this->sendResponse($reservation->toArray(), "Reservation updated successfully");
	}

	/**
	 * Remove the specified Reservation from storage.
	 * DELETE /reservations/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->reservationRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Reservation deleted successfully");
	}
}
