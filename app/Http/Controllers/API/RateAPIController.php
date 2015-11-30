<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\RateRepository;
use App\Models\Rate;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class RateAPIController extends AppBaseController
{
	/** @var  RateRepository */
	private $rateRepository;

	function __construct(RateRepository $rateRepo)
	{
		$this->rateRepository = $rateRepo;
	}

	/**
	 * Display a listing of the Rate.
	 * GET|HEAD /rates
	 *
	 * @return Response
	 */
	public function index()
	{
		$rates = $this->rateRepository->all();

		return $this->sendResponse($rates->toArray(), "Rates retrieved successfully");
	}

	/**
	 * Show the form for creating a new Rate.
	 * GET|HEAD /rates/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Rate in storage.
	 * POST /rates
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Rate::$rules) > 0)
			$this->validateRequestOrFail($request, Rate::$rules);

		$input = $request->all();

		$rates = $this->rateRepository->create($input);

		return $this->sendResponse($rates->toArray(), "Rate saved successfully");
	}

	/**
	 * Display the specified Rate.
	 * GET|HEAD /rates/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$rate = $this->rateRepository->apiFindOrFail($id);

		return $this->sendResponse($rate->toArray(), "Rate retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Rate.
	 * GET|HEAD /rates/{id}/edit
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
	 * Update the specified Rate in storage.
	 * PUT/PATCH /rates/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Rate $rate */
		$rate = $this->rateRepository->apiFindOrFail($id);

		$result = $this->rateRepository->updateRich($input, $id);

		$rate = $rate->fresh();

		return $this->sendResponse($rate->toArray(), "Rate updated successfully");
	}

	/**
	 * Remove the specified Rate from storage.
	 * DELETE /rates/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->rateRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Rate deleted successfully");
	}
}
