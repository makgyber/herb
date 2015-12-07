<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\PartnerDiscountRepository;
use App\Models\PartnerDiscount;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PartnerDiscountAPIController extends AppBaseController
{
	/** @var  PartnerDiscountRepository */
	private $partnerDiscountRepository;

	function __construct(PartnerDiscountRepository $partnerDiscountRepo)
	{
		$this->partnerDiscountRepository = $partnerDiscountRepo;
	}

	/**
	 * Display a listing of the PartnerDiscount.
	 * GET|HEAD /partnerDiscounts
	 *
	 * @return Response
	 */
	public function index()
	{
		$partnerDiscounts = $this->partnerDiscountRepository->all();

		return $this->sendResponse($partnerDiscounts->toArray(), "PartnerDiscounts retrieved successfully");
	}

	/**
	 * Show the form for creating a new PartnerDiscount.
	 * GET|HEAD /partnerDiscounts/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created PartnerDiscount in storage.
	 * POST /partnerDiscounts
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(PartnerDiscount::$rules) > 0)
			$this->validateRequestOrFail($request, PartnerDiscount::$rules);

		$input = $request->all();

		$partnerDiscounts = $this->partnerDiscountRepository->create($input);

		return $this->sendResponse($partnerDiscounts->toArray(), "PartnerDiscount saved successfully");
	}

	/**
	 * Display the specified PartnerDiscount.
	 * GET|HEAD /partnerDiscounts/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$partnerDiscount = $this->partnerDiscountRepository->apiFindOrFail($id);

		return $this->sendResponse($partnerDiscount->toArray(), "PartnerDiscount retrieved successfully");
	}

	/**
	 * Show the form for editing the specified PartnerDiscount.
	 * GET|HEAD /partnerDiscounts/{id}/edit
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
	 * Update the specified PartnerDiscount in storage.
	 * PUT/PATCH /partnerDiscounts/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var PartnerDiscount $partnerDiscount */
		$partnerDiscount = $this->partnerDiscountRepository->apiFindOrFail($id);

		$result = $this->partnerDiscountRepository->updateRich($input, $id);

		$partnerDiscount = $partnerDiscount->fresh();

		return $this->sendResponse($partnerDiscount->toArray(), "PartnerDiscount updated successfully");
	}

	/**
	 * Remove the specified PartnerDiscount from storage.
	 * DELETE /partnerDiscounts/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->partnerDiscountRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "PartnerDiscount deleted successfully");
	}
}
