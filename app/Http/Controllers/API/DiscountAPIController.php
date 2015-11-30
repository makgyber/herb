<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\DiscountRepository;
use App\Models\Discount;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class DiscountAPIController extends AppBaseController
{
	/** @var  DiscountRepository */
	private $discountRepository;

	function __construct(DiscountRepository $discountRepo)
	{
		$this->discountRepository = $discountRepo;
	}

	/**
	 * Display a listing of the Discount.
	 * GET|HEAD /discounts
	 *
	 * @return Response
	 */
	public function index()
	{
		$discounts = $this->discountRepository->all();

		return $this->sendResponse($discounts->toArray(), "Discounts retrieved successfully");
	}

	/**
	 * Show the form for creating a new Discount.
	 * GET|HEAD /discounts/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Discount in storage.
	 * POST /discounts
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Discount::$rules) > 0)
			$this->validateRequestOrFail($request, Discount::$rules);

		$input = $request->all();

		$discounts = $this->discountRepository->create($input);

		return $this->sendResponse($discounts->toArray(), "Discount saved successfully");
	}

	/**
	 * Display the specified Discount.
	 * GET|HEAD /discounts/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$discount = $this->discountRepository->apiFindOrFail($id);

		return $this->sendResponse($discount->toArray(), "Discount retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Discount.
	 * GET|HEAD /discounts/{id}/edit
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
	 * Update the specified Discount in storage.
	 * PUT/PATCH /discounts/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Discount $discount */
		$discount = $this->discountRepository->apiFindOrFail($id);

		$result = $this->discountRepository->updateRich($input, $id);

		$discount = $discount->fresh();

		return $this->sendResponse($discount->toArray(), "Discount updated successfully");
	}

	/**
	 * Remove the specified Discount from storage.
	 * DELETE /discounts/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->discountRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Discount deleted successfully");
	}
}
