<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\FinanceChargeRepository;
use App\Models\FinanceCharge;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class FinanceChargeAPIController extends AppBaseController
{
	/** @var  FinanceChargeRepository */
	private $financeChargeRepository;

	function __construct(FinanceChargeRepository $financeChargeRepo)
	{
		$this->financeChargeRepository = $financeChargeRepo;
	}

	/**
	 * Display a listing of the FinanceCharge.
	 * GET|HEAD /financeCharges
	 *
	 * @return Response
	 */
	public function index()
	{
		$financeCharges = $this->financeChargeRepository->all();

		return $this->sendResponse($financeCharges->toArray(), "FinanceCharges retrieved successfully");
	}

	/**
	 * Show the form for creating a new FinanceCharge.
	 * GET|HEAD /financeCharges/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created FinanceCharge in storage.
	 * POST /financeCharges
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(FinanceCharge::$rules) > 0)
			$this->validateRequestOrFail($request, FinanceCharge::$rules);

		$input = $request->all();

		$financeCharges = $this->financeChargeRepository->create($input);

		return $this->sendResponse($financeCharges->toArray(), "FinanceCharge saved successfully");
	}

	/**
	 * Display the specified FinanceCharge.
	 * GET|HEAD /financeCharges/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$financeCharge = $this->financeChargeRepository->apiFindOrFail($id);

		return $this->sendResponse($financeCharge->toArray(), "FinanceCharge retrieved successfully");
	}

	/**
	 * Show the form for editing the specified FinanceCharge.
	 * GET|HEAD /financeCharges/{id}/edit
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
	 * Update the specified FinanceCharge in storage.
	 * PUT/PATCH /financeCharges/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var FinanceCharge $financeCharge */
		$financeCharge = $this->financeChargeRepository->apiFindOrFail($id);

		$result = $this->financeChargeRepository->updateRich($input, $id);

		$financeCharge = $financeCharge->fresh();

		return $this->sendResponse($financeCharge->toArray(), "FinanceCharge updated successfully");
	}

	/**
	 * Remove the specified FinanceCharge from storage.
	 * DELETE /financeCharges/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->financeChargeRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "FinanceCharge deleted successfully");
	}
}
