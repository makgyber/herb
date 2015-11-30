<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\BookingRoomTypesRepository;
use App\Models\BookingRoomTypes;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class BookingRoomTypesAPIController extends AppBaseController
{
	/** @var  BookingRoomTypesRepository */
	private $bookingRoomTypesRepository;

	function __construct(BookingRoomTypesRepository $bookingRoomTypesRepo)
	{
		$this->bookingRoomTypesRepository = $bookingRoomTypesRepo;
	}

	/**
	 * Display a listing of the BookingRoomTypes.
	 * GET|HEAD /bookingRoomTypes
	 *
	 * @return Response
	 */
	public function index()
	{
		$bookingRoomTypes = $this->bookingRoomTypesRepository->all();

		return $this->sendResponse($bookingRoomTypes->toArray(), "BookingRoomTypes retrieved successfully");
	}

	/**
	 * Show the form for creating a new BookingRoomTypes.
	 * GET|HEAD /bookingRoomTypes/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created BookingRoomTypes in storage.
	 * POST /bookingRoomTypes
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(BookingRoomTypes::$rules) > 0)
			$this->validateRequestOrFail($request, BookingRoomTypes::$rules);

		$input = $request->all();

		$bookingRoomTypes = $this->bookingRoomTypesRepository->create($input);

		return $this->sendResponse($bookingRoomTypes->toArray(), "BookingRoomTypes saved successfully");
	}

	/**
	 * Display the specified BookingRoomTypes.
	 * GET|HEAD /bookingRoomTypes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$bookingRoomTypes = $this->bookingRoomTypesRepository->apiFindOrFail($id);

		return $this->sendResponse($bookingRoomTypes->toArray(), "BookingRoomTypes retrieved successfully");
	}

	/**
	 * Show the form for editing the specified BookingRoomTypes.
	 * GET|HEAD /bookingRoomTypes/{id}/edit
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
	 * Update the specified BookingRoomTypes in storage.
	 * PUT/PATCH /bookingRoomTypes/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var BookingRoomTypes $bookingRoomTypes */
		$bookingRoomTypes = $this->bookingRoomTypesRepository->apiFindOrFail($id);

		$result = $this->bookingRoomTypesRepository->updateRich($input, $id);

		$bookingRoomTypes = $bookingRoomTypes->fresh();

		return $this->sendResponse($bookingRoomTypes->toArray(), "BookingRoomTypes updated successfully");
	}

	/**
	 * Remove the specified BookingRoomTypes from storage.
	 * DELETE /bookingRoomTypes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->bookingRoomTypesRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "BookingRoomTypes deleted successfully");
	}
}
