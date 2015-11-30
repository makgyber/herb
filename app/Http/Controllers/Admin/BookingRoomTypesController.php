<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\CreateBookingRoomTypesRequest;
use App\Http\Requests\UpdateBookingRoomTypesRequest;
use App\Libraries\Repositories\BookingRoomTypesRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class BookingRoomTypesController extends AppBaseController
{

	/** @var  BookingRoomTypesRepository */
	private $bookingRoomTypesRepository;

	function __construct(BookingRoomTypesRepository $bookingRoomTypesRepo)
	{
		$this->bookingRoomTypesRepository = $bookingRoomTypesRepo;
	}

	/**
	 * Display a listing of the BookingRoomTypes.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bookingRoomTypes = $this->bookingRoomTypesRepository->paginate(10);

		return view('bookingRoomTypes.index')
			->with('bookingRoomTypes', $bookingRoomTypes);
	}

	/**
	 * Show the form for creating a new BookingRoomTypes.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('bookingRoomTypes.create');
	}

	/**
	 * Store a newly created BookingRoomTypes in storage.
	 *
	 * @param CreateBookingRoomTypesRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateBookingRoomTypesRequest $request)
	{
		$input = $request->all();

		$bookingRoomTypes = $this->bookingRoomTypesRepository->create($input);

		Flash::success('BookingRoomTypes saved successfully.');

		return redirect(route('bookingRoomTypes.index'));
	}

	/**
	 * Display the specified BookingRoomTypes.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$bookingRoomTypes = $this->bookingRoomTypesRepository->find($id);

		if(empty($bookingRoomTypes))
		{
			Flash::error('BookingRoomTypes not found');

			return redirect(route('bookingRoomTypes.index'));
		}

		return view('bookingRoomTypes.show')->with('bookingRoomTypes', $bookingRoomTypes);
	}

	/**
	 * Show the form for editing the specified BookingRoomTypes.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$bookingRoomTypes = $this->bookingRoomTypesRepository->find($id);

		if(empty($bookingRoomTypes))
		{
			Flash::error('BookingRoomTypes not found');

			return redirect(route('bookingRoomTypes.index'));
		}

		return view('bookingRoomTypes.edit')->with('bookingRoomTypes', $bookingRoomTypes);
	}

	/**
	 * Update the specified BookingRoomTypes in storage.
	 *
	 * @param  int              $id
	 * @param UpdateBookingRoomTypesRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateBookingRoomTypesRequest $request)
	{
		$bookingRoomTypes = $this->bookingRoomTypesRepository->find($id);

		if(empty($bookingRoomTypes))
		{
			Flash::error('BookingRoomTypes not found');

			return redirect(route('bookingRoomTypes.index'));
		}

		$this->bookingRoomTypesRepository->updateRich($request->all(), $id);

		Flash::success('BookingRoomTypes updated successfully.');

		return redirect(route('bookingRoomTypes.index'));
	}

	/**
	 * Remove the specified BookingRoomTypes from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$bookingRoomTypes = $this->bookingRoomTypesRepository->find($id);

		if(empty($bookingRoomTypes))
		{
			Flash::error('BookingRoomTypes not found');

			return redirect(route('bookingRoomTypes.index'));
		}

		$this->bookingRoomTypesRepository->delete($id);

		Flash::success('BookingRoomTypes deleted successfully.');

		return redirect(route('bookingRoomTypes.index'));
	}
}
