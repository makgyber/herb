<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\RoomRepository;
use App\Models\Room;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class RoomAPIController extends AppBaseController
{
	/** @var  RoomRepository */
	private $roomRepository;

	function __construct(RoomRepository $roomRepo)
	{
		$this->roomRepository = $roomRepo;
	}

	/**
	 * Display a listing of the Room.
	 * GET|HEAD /rooms
	 *
	 * @return Response
	 */
	public function index()
	{
		$rooms = $this->roomRepository->all();

		return $this->sendResponse($rooms->toArray(), "Rooms retrieved successfully");
	}

	/**
	 * Show the form for creating a new Room.
	 * GET|HEAD /rooms/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Room in storage.
	 * POST /rooms
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Room::$rules) > 0)
			$this->validateRequestOrFail($request, Room::$rules);

		$input = $request->all();

		$rooms = $this->roomRepository->create($input);

		return $this->sendResponse($rooms->toArray(), "Room saved successfully");
	}

	/**
	 * Display the specified Room.
	 * GET|HEAD /rooms/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$room = $this->roomRepository->apiFindOrFail($id);

		return $this->sendResponse($room->toArray(), "Room retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Room.
	 * GET|HEAD /rooms/{id}/edit
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
	 * Update the specified Room in storage.
	 * PUT/PATCH /rooms/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Room $room */
		$room = $this->roomRepository->apiFindOrFail($id);

		$result = $this->roomRepository->updateRich($input, $id);

		$room = $room->fresh();

		return $this->sendResponse($room->toArray(), "Room updated successfully");
	}

	/**
	 * Remove the specified Room from storage.
	 * DELETE /rooms/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->roomRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Room deleted successfully");
	}
}
