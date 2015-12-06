<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\PartnerTransactionRepository;
use App\Models\PartnerTransaction;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PartnerTransactionAPIController extends AppBaseController
{
	/** @var  PartnerTransactionRepository */
	private $partnerTransactionRepository;

	function __construct(PartnerTransactionRepository $partnerTransactionRepo)
	{
		$this->partnerTransactionRepository = $partnerTransactionRepo;
	}

	/**
	 * Display a listing of the PartnerTransaction.
	 * GET|HEAD /partnerTransactions
	 *
	 * @return Response
	 */
	public function index()
	{
		$partnerTransactions = $this->partnerTransactionRepository->all();

		return $this->sendResponse($partnerTransactions->toArray(), "PartnerTransactions retrieved successfully");
	}

	/**
	 * Show the form for creating a new PartnerTransaction.
	 * GET|HEAD /partnerTransactions/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created PartnerTransaction in storage.
	 * POST /partnerTransactions
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(PartnerTransaction::$rules) > 0)
			$this->validateRequestOrFail($request, PartnerTransaction::$rules);

		$input = $request->all();

		$partnerTransactions = $this->partnerTransactionRepository->create($input);

		return $this->sendResponse($partnerTransactions->toArray(), "PartnerTransaction saved successfully");
	}

	/**
	 * Display the specified PartnerTransaction.
	 * GET|HEAD /partnerTransactions/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$partnerTransaction = $this->partnerTransactionRepository->apiFindOrFail($id);

		return $this->sendResponse($partnerTransaction->toArray(), "PartnerTransaction retrieved successfully");
	}

	/**
	 * Show the form for editing the specified PartnerTransaction.
	 * GET|HEAD /partnerTransactions/{id}/edit
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
	 * Update the specified PartnerTransaction in storage.
	 * PUT/PATCH /partnerTransactions/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var PartnerTransaction $partnerTransaction */
		$partnerTransaction = $this->partnerTransactionRepository->apiFindOrFail($id);

		$result = $this->partnerTransactionRepository->updateRich($input, $id);

		$partnerTransaction = $partnerTransaction->fresh();

		return $this->sendResponse($partnerTransaction->toArray(), "PartnerTransaction updated successfully");
	}

	/**
	 * Remove the specified PartnerTransaction from storage.
	 * DELETE /partnerTransactions/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->partnerTransactionRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "PartnerTransaction deleted successfully");
	}
}
