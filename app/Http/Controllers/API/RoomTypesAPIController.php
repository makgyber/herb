<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\RoomTypesRepository;
use App\Models\RoomTypes;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class RoomTypesAPIController extends AppBaseController
{
	/** @var  RoomTypesRepository */
	private $roomTypesRepository;

	function __construct(RoomTypesRepository $roomTypesRepo)
	{
		$this->roomTypesRepository = $roomTypesRepo;
	}

	/**
	 * Display a listing of the RoomTypes.
	 * GET|HEAD /roomTypes
	 *
	 * @return Response
	 */
	public function index()
	{
		$roomTypes = $this->roomTypesRepository->all();

		return $this->sendResponse($roomTypes->toArray(), "RoomTypes retrieved successfully");
	}

	/**
	 * Show the form for creating a new RoomTypes.
	 * GET|HEAD /roomTypes/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created RoomTypes in storage.
	 * POST /roomTypes
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(RoomTypes::$rules) > 0)
			$this->validateRequestOrFail($request, RoomTypes::$rules);

		$input = $request->all();

		$roomTypes = $this->roomTypesRepository->create($input);

		return $this->sendResponse($roomTypes->toArray(), "RoomTypes saved successfully");
	}

	/**
	 * Display the specified RoomTypes.
	 * GET|HEAD /roomTypes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$roomTypes = $this->roomTypesRepository->apiFindOrFail($id);

		return $this->sendResponse($roomTypes->toArray(), "RoomTypes retrieved successfully");
	}

	/**
	 * Show the form for editing the specified RoomTypes.
	 * GET|HEAD /roomTypes/{id}/edit
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
	 * Update the specified RoomTypes in storage.
	 * PUT/PATCH /roomTypes/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var RoomTypes $roomTypes */
		$roomTypes = $this->roomTypesRepository->apiFindOrFail($id);

		$result = $this->roomTypesRepository->updateRich($input, $id);

		$roomTypes = $roomTypes->fresh();

		return $this->sendResponse($roomTypes->toArray(), "RoomTypes updated successfully");
	}

	/**
	 * Remove the specified RoomTypes from storage.
	 * DELETE /roomTypes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->roomTypesRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "RoomTypes deleted successfully");
	}
}
