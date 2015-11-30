<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\PartnersRepository;
use App\Models\Partners;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PartnersAPIController extends AppBaseController
{
	/** @var  PartnersRepository */
	private $partnersRepository;

	function __construct(PartnersRepository $partnersRepo)
	{
		$this->partnersRepository = $partnersRepo;
	}

	/**
	 * Display a listing of the Partners.
	 * GET|HEAD /partners
	 *
	 * @return Response
	 */
	public function index()
	{
		$partners = $this->partnersRepository->all();

		return $this->sendResponse($partners->toArray(), "Partners retrieved successfully");
	}

	/**
	 * Show the form for creating a new Partners.
	 * GET|HEAD /partners/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Partners in storage.
	 * POST /partners
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Partners::$rules) > 0)
			$this->validateRequestOrFail($request, Partners::$rules);

		$input = $request->all();

		$partners = $this->partnersRepository->create($input);

		return $this->sendResponse($partners->toArray(), "Partners saved successfully");
	}

	/**
	 * Display the specified Partners.
	 * GET|HEAD /partners/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$partners = $this->partnersRepository->apiFindOrFail($id);

		return $this->sendResponse($partners->toArray(), "Partners retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Partners.
	 * GET|HEAD /partners/{id}/edit
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
	 * Update the specified Partners in storage.
	 * PUT/PATCH /partners/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Partners $partners */
		$partners = $this->partnersRepository->apiFindOrFail($id);

		$result = $this->partnersRepository->updateRich($input, $id);

		$partners = $partners->fresh();

		return $this->sendResponse($partners->toArray(), "Partners updated successfully");
	}

	/**
	 * Remove the specified Partners from storage.
	 * DELETE /partners/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->partnersRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Partners deleted successfully");
	}
}
