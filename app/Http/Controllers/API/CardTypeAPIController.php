<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\CardTypeRepository;
use App\Models\CardType;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class CardTypeAPIController extends AppBaseController
{
	/** @var  CardTypeRepository */
	private $cardTypeRepository;

	function __construct(CardTypeRepository $cardTypeRepo)
	{
		$this->cardTypeRepository = $cardTypeRepo;
	}

	/**
	 * Display a listing of the CardType.
	 * GET|HEAD /cardTypes
	 *
	 * @return Response
	 */
	public function index()
	{
		$cardTypes = $this->cardTypeRepository->all();

		return $this->sendResponse($cardTypes->toArray(), "CardTypes retrieved successfully");
	}

	/**
	 * Show the form for creating a new CardType.
	 * GET|HEAD /cardTypes/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created CardType in storage.
	 * POST /cardTypes
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(CardType::$rules) > 0)
			$this->validateRequestOrFail($request, CardType::$rules);

		$input = $request->all();

		$cardTypes = $this->cardTypeRepository->create($input);

		return $this->sendResponse($cardTypes->toArray(), "CardType saved successfully");
	}

	/**
	 * Display the specified CardType.
	 * GET|HEAD /cardTypes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$cardType = $this->cardTypeRepository->apiFindOrFail($id);

		return $this->sendResponse($cardType->toArray(), "CardType retrieved successfully");
	}

	/**
	 * Show the form for editing the specified CardType.
	 * GET|HEAD /cardTypes/{id}/edit
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
	 * Update the specified CardType in storage.
	 * PUT/PATCH /cardTypes/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var CardType $cardType */
		$cardType = $this->cardTypeRepository->apiFindOrFail($id);

		$result = $this->cardTypeRepository->updateRich($input, $id);

		$cardType = $cardType->fresh();

		return $this->sendResponse($cardType->toArray(), "CardType updated successfully");
	}

	/**
	 * Remove the specified CardType from storage.
	 * DELETE /cardTypes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->cardTypeRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "CardType deleted successfully");
	}
}
