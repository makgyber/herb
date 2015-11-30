<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ReservedRoomDateRepository;
use App\Models\ReservedRoomDate;
use App\Models\ReserveRoom;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ReservedRoomDateAPIController extends AppBaseController
{
	/** @var  ReservedRoomDateRepository */
	private $reservedRoomDateRepository;

	function __construct(ReservedRoomDateRepository $reservedRoomDateRepo)
	{
		$this->reservedRoomDateRepository = $reservedRoomDateRepo;
	}

	/**
	 * Display a listing of the ReservedRoomDate.
	 * GET|HEAD /reservedRoomDates
	 *
	 * @return Response
	 */
	public function index()
	{
		$reservedRoomDates = $this->reservedRoomDateRepository->all();

		return $this->sendResponse($reservedRoomDates->toArray(), "ReservedRoomDates retrieved successfully");
	}

	/**
	 * Show the form for creating a new ReservedRoomDate.
	 * GET|HEAD /reservedRoomDates/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created ReservedRoomDate in storage.
	 * POST /reservedRoomDates
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(ReservedRoomDate::$rules) > 0)
			$this->validateRequestOrFail($request, ReservedRoomDate::$rules);

		$input = $request->all();

		$reservedRoomDates = $this->reservedRoomDateRepository->create($input);

		return $this->sendResponse($reservedRoomDates->toArray(), "ReservedRoomDate saved successfully");
	}

	/**
	 * Display the specified ReservedRoomDate.
	 * GET|HEAD /reservedRoomDates/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$reservedRoomDate = $this->reservedRoomDateRepository->apiFindOrFail($id);

		return $this->sendResponse($reservedRoomDate->toArray(), "ReservedRoomDate retrieved successfully");
	}

	/**
	 * Show the form for editing the specified ReservedRoomDate.
	 * GET|HEAD /reservedRoomDates/{id}/edit
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
	 * Update the specified ReservedRoomDate in storage.
	 * PUT/PATCH /reservedRoomDates/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var ReservedRoomDate $reservedRoomDate */
		$reservedRoomDate = $this->reservedRoomDateRepository->apiFindOrFail($id);

		$result = $this->reservedRoomDateRepository->updateRich($input, $id);

		$reservedRoomDate = $reservedRoomDate->fresh();

		return $this->sendResponse($reservedRoomDate->toArray(), "ReservedRoomDate updated successfully");
	}

	/**
	 * Remove the specified ReservedRoomDate from storage.
	 * DELETE /reservedRoomDates/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->reservedRoomDateRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "ReservedRoomDate deleted successfully");
	}

	public function detail($id)
	{

		$rr = ReserveRoom::find($id);

		return response()->json($rr);
	}
}
