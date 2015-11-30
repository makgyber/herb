<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\FloorRepository;
use App\Models\Floor;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class FloorAPIController extends AppBaseController
{
	/** @var  FloorRepository */
	private $floorRepository;

	function __construct(FloorRepository $floorRepo)
	{
		$this->floorRepository = $floorRepo;
	}

	/**
	 * Display a listing of the Floor.
	 * GET|HEAD /floors
	 *
	 * @return Response
	 */
	public function index()
	{
		$floors = $this->floorRepository->all();

		return $this->sendResponse($floors->toArray(), "Floors retrieved successfully");
	}

	/**
	 * Show the form for creating a new Floor.
	 * GET|HEAD /floors/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Floor in storage.
	 * POST /floors
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Floor::$rules) > 0)
			$this->validateRequestOrFail($request, Floor::$rules);

		$input = $request->all();

		$floors = $this->floorRepository->create($input);

		return $this->sendResponse($floors->toArray(), "Floor saved successfully");
	}

	/**
	 * Display the specified Floor.
	 * GET|HEAD /floors/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$floor = $this->floorRepository->apiFindOrFail($id);

		return $this->sendResponse($floor->toArray(), "Floor retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Floor.
	 * GET|HEAD /floors/{id}/edit
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
	 * Update the specified Floor in storage.
	 * PUT/PATCH /floors/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Floor $floor */
		$floor = $this->floorRepository->apiFindOrFail($id);

		$result = $this->floorRepository->updateRich($input, $id);

		$floor = $floor->fresh();

		return $this->sendResponse($floor->toArray(), "Floor updated successfully");
	}

	/**
	 * Remove the specified Floor from storage.
	 * DELETE /floors/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->floorRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Floor deleted successfully");
	}
}
