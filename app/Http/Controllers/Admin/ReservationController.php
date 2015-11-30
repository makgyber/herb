<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\CreateReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Libraries\Repositories\ReservationRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ReservationController extends AppBaseController
{

	/** @var  ReservationRepository */
	private $reservationRepository;

	function __construct(ReservationRepository $reservationRepo)
	{
		$this->reservationRepository = $reservationRepo;
	}

	/**
	 * Display a listing of the Reservation.
	 *
	 * @return Response
	 */
	public function index()
	{
		$reservations = $this->reservationRepository->paginate(10);

		return view('reservations.index')
			->with('reservations', $reservations);
	}

	/**
	 * Show the form for creating a new Reservation.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('reservations.create');
	}

	/**
	 * Store a newly created Reservation in storage.
	 *
	 * @param CreateReservationRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateReservationRequest $request)
	{
		$input = $request->all();

		$reservation = $this->reservationRepository->create($input);

		Flash::success('Reservation saved successfully.');

		return redirect(route('reservations.index'));
	}

	/**
	 * Display the specified Reservation.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$reservation = $this->reservationRepository->find($id);

		if(empty($reservation))
		{
			Flash::error('Reservation not found');

			return redirect(route('reservations.index'));
		}

		return view('reservations.show')->with('reservation', $reservation);
	}

	/**
	 * Show the form for editing the specified Reservation.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$reservation = $this->reservationRepository->find($id);

		if(empty($reservation))
		{
			Flash::error('Reservation not found');

			return redirect(route('reservations.index'));
		}

		return view('reservations.edit')->with('reservation', $reservation);
	}

	/**
	 * Update the specified Reservation in storage.
	 *
	 * @param  int              $id
	 * @param UpdateReservationRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateReservationRequest $request)
	{
		$reservation = $this->reservationRepository->find($id);

		if(empty($reservation))
		{
			Flash::error('Reservation not found');

			return redirect(route('reservations.index'));
		}

		$this->reservationRepository->updateRich($request->all(), $id);

		Flash::success('Reservation updated successfully.');

		return redirect(route('reservations.index'));
	}

	/**
	 * Remove the specified Reservation from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$reservation = $this->reservationRepository->find($id);

		if(empty($reservation))
		{
			Flash::error('Reservation not found');

			return redirect(route('reservations.index'));
		}

		$this->reservationRepository->delete($id);

		Flash::success('Reservation deleted successfully.');

		return redirect(route('reservations.index'));
	}
}
