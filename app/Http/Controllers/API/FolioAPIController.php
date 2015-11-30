<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\FolioRepository;
use App\Models\Folio;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class FolioAPIController extends AppBaseController
{
	/** @var  FolioRepository */
	private $folioRepository;

	function __construct(FolioRepository $folioRepo)
	{
		$this->folioRepository = $folioRepo;
	}

	/**
	 * Display a listing of the Folio.
	 * GET|HEAD /folios
	 *
	 * @return Response
	 */
	public function index()
	{
		$folios = $this->folioRepository->all();

		return $this->sendResponse($folios->toArray(), "Folios retrieved successfully");
	}

	/**
	 * Show the form for creating a new Folio.
	 * GET|HEAD /folios/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Folio in storage.
	 * POST /folios
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Folio::$rules) > 0)
			$this->validateRequestOrFail($request, Folio::$rules);

		$input = $request->all();

		$folios = $this->folioRepository->create($input);

		return $this->sendResponse($folios->toArray(), "Folio saved successfully");
	}

	/**
	 * Display the specified Folio.
	 * GET|HEAD /folios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$folio = $this->folioRepository->apiFindOrFail($id);

		return $this->sendResponse($folio->toArray(), "Folio retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Folio.
	 * GET|HEAD /folios/{id}/edit
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
	 * Update the specified Folio in storage.
	 * PUT/PATCH /folios/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Folio $folio */
		$folio = $this->folioRepository->apiFindOrFail($id);

		$result = $this->folioRepository->updateRich($input, $id);

		$folio = $folio->fresh();

		return $this->sendResponse($folio->toArray(), "Folio updated successfully");
	}

	/**
	 * Remove the specified Folio from storage.
	 * DELETE /folios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->folioRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Folio deleted successfully");
	}
}
