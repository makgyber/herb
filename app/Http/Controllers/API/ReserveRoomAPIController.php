<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ReserveRoomRepository;
use App\Models\ReserveRoom;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ReserveRoomAPIController extends AppBaseController
{
	/** @var  ReserveRoomRepository */
	private $reserveRoomRepository;

	function __construct(ReserveRoomRepository $reserveRoomRepo)
	{
		$this->reserveRoomRepository = $reserveRoomRepo;
	}

	/**
	 * Display a listing of the ReserveRoom.
	 * GET|HEAD /reserveRooms
	 *
	 * @return Response
	 */
	public function index()
	{
		$reserveRooms = $this->reserveRoomRepository->all();

		return $this->sendResponse($reserveRooms->toArray(), "ReserveRooms retrieved successfully");
	}

	/**
	 * Show the form for creating a new ReserveRoom.
	 * GET|HEAD /reserveRooms/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created ReserveRoom in storage.
	 * POST /reserveRooms
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(ReserveRoom::$rules) > 0)
			$this->validateRequestOrFail($request, ReserveRoom::$rules);

		$input = $request->all();

		$reserveRooms = $this->reserveRoomRepository->create($input);

		return $this->sendResponse($reserveRooms->toArray(), "ReserveRoom saved successfully");
	}

	/**
	 * Display the specified ReserveRoom.
	 * GET|HEAD /reserveRooms/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$reserveRoom = $this->reserveRoomRepository->apiFindOrFail($id);

		return $this->sendResponse($reserveRoom->toArray(), "ReserveRoom retrieved successfully");
	}

	/**
	 * Show the form for editing the specified ReserveRoom.
	 * GET|HEAD /reserveRooms/{id}/edit
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
	 * Update the specified ReserveRoom in storage.
	 * PUT/PATCH /reserveRooms/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var ReserveRoom $reserveRoom */
		$reserveRoom = $this->reserveRoomRepository->apiFindOrFail($id);

		$result = $this->reserveRoomRepository->updateRich($input, $id);

		$reserveRoom = $reserveRoom->fresh();

		return $this->sendResponse($reserveRoom->toArray(), "ReserveRoom updated successfully");
	}

	/**
	 * Remove the specified ReserveRoom from storage.
	 * DELETE /reserveRooms/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->reserveRoomRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "ReserveRoom deleted successfully");
	}
}
