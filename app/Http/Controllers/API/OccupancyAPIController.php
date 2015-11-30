<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\OccupancyRepository;
use App\Models\Occupancy;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class OccupancyAPIController extends AppBaseController
{
	/** @var  OccupancyRepository */
	private $occupancyRepository;

	function __construct(OccupancyRepository $occupancyRepo)
	{
		$this->occupancyRepository = $occupancyRepo;
	}

	/**
	 * Display a listing of the Occupancy.
	 * GET|HEAD /occupancies
	 *
	 * @return Response
	 */
	public function index()
	{
		$occupancies = $this->occupancyRepository->all();

		return $this->sendResponse($occupancies->toArray(), "Occupancies retrieved successfully");
	}

	/**
	 * Show the form for creating a new Occupancy.
	 * GET|HEAD /occupancies/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Occupancy in storage.
	 * POST /occupancies
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Occupancy::$rules) > 0)
			$this->validateRequestOrFail($request, Occupancy::$rules);

		$input = $request->all();

		$occupancies = $this->occupancyRepository->create($input);

		return $this->sendResponse($occupancies->toArray(), "Occupancy saved successfully");
	}

	/**
	 * Display the specified Occupancy.
	 * GET|HEAD /occupancies/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$occupancy = $this->occupancyRepository->apiFindOrFail($id);

		return $this->sendResponse($occupancy->toArray(), "Occupancy retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Occupancy.
	 * GET|HEAD /occupancies/{id}/edit
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
	 * Update the specified Occupancy in storage.
	 * PUT/PATCH /occupancies/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Occupancy $occupancy */
		$occupancy = $this->occupancyRepository->apiFindOrFail($id);

		$result = $this->occupancyRepository->updateRich($input, $id);

		$occupancy = $occupancy->fresh();

		return $this->sendResponse($occupancy->toArray(), "Occupancy updated successfully");
	}

	/**
	 * Remove the specified Occupancy from storage.
	 * DELETE /occupancies/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->occupancyRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Occupancy deleted successfully");
	}
}
