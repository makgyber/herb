<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\OccupancyRoomRepository;
use App\Models\OccupancyRoom;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class OccupancyRoomAPIController extends AppBaseController
{
	/** @var  OccupancyRoomRepository */
	private $occupancyRoomRepository;

	function __construct(OccupancyRoomRepository $occupancyRoomRepo)
	{
		$this->occupancyRoomRepository = $occupancyRoomRepo;
	}

	/**
	 * Display a listing of the OccupancyRoom.
	 * GET|HEAD /occupancyRooms
	 *
	 * @return Response
	 */
	public function index()
	{
		$occupancyRooms = $this->occupancyRoomRepository->all();

		return $this->sendResponse($occupancyRooms->toArray(), "OccupancyRooms retrieved successfully");
	}

	/**
	 * Show the form for creating a new OccupancyRoom.
	 * GET|HEAD /occupancyRooms/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created OccupancyRoom in storage.
	 * POST /occupancyRooms
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(OccupancyRoom::$rules) > 0)
			$this->validateRequestOrFail($request, OccupancyRoom::$rules);

		$input = $request->all();

		$occupancyRooms = $this->occupancyRoomRepository->create($input);

		return $this->sendResponse($occupancyRooms->toArray(), "OccupancyRoom saved successfully");
	}

	/**
	 * Display the specified OccupancyRoom.
	 * GET|HEAD /occupancyRooms/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$occupancyRoom = $this->occupancyRoomRepository->apiFindOrFail($id);

		return $this->sendResponse($occupancyRoom->toArray(), "OccupancyRoom retrieved successfully");
	}

	/**
	 * Show the form for editing the specified OccupancyRoom.
	 * GET|HEAD /occupancyRooms/{id}/edit
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
	 * Update the specified OccupancyRoom in storage.
	 * PUT/PATCH /occupancyRooms/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var OccupancyRoom $occupancyRoom */
		$occupancyRoom = $this->occupancyRoomRepository->apiFindOrFail($id);

		$result = $this->occupancyRoomRepository->updateRich($input, $id);

		$occupancyRoom = $occupancyRoom->fresh();

		return $this->sendResponse($occupancyRoom->toArray(), "OccupancyRoom updated successfully");
	}

	/**
	 * Remove the specified OccupancyRoom from storage.
	 * DELETE /occupancyRooms/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->occupancyRoomRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "OccupancyRoom deleted successfully");
	}
}
