<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePartnerTransactionRequest;
use App\Http\Requests\UpdatePartnerTransactionRequest;
use App\Libraries\Repositories\PartnerTransactionRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PartnerTransactionController extends AppBaseController
{

	/** @var  PartnerTransactionRepository */
	private $partnerTransactionRepository;

	function __construct(PartnerTransactionRepository $partnerTransactionRepo)
	{
		$this->partnerTransactionRepository = $partnerTransactionRepo;
	}

	/**
	 * Display a listing of the PartnerTransaction.
	 *
	 * @return Response
	 */
	public function index()
	{
		$partnerTransactions = $this->partnerTransactionRepository->paginate(10);

		return view('partnerTransactions.index')
			->with('partnerTransactions', $partnerTransactions);
	}

	/**
	 * Show the form for creating a new PartnerTransaction.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('partnerTransactions.create');
	}

	/**
	 * Store a newly created PartnerTransaction in storage.
	 *
	 * @param CreatePartnerTransactionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePartnerTransactionRequest $request)
	{
		$input = $request->all();

		$partnerTransaction = $this->partnerTransactionRepository->create($input);

		Flash::success('PartnerTransaction saved successfully.');

		return redirect(route('partnerTransactions.index'));
	}

	/**
	 * Display the specified PartnerTransaction.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$partnerTransaction = $this->partnerTransactionRepository->find($id);

		if(empty($partnerTransaction))
		{
			Flash::error('PartnerTransaction not found');

			return redirect(route('partnerTransactions.index'));
		}

		return view('partnerTransactions.show')->with('partnerTransaction', $partnerTransaction);
	}

	/**
	 * Show the form for editing the specified PartnerTransaction.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$partnerTransaction = $this->partnerTransactionRepository->find($id);

		if(empty($partnerTransaction))
		{
			Flash::error('PartnerTransaction not found');

			return redirect(route('partnerTransactions.index'));
		}

		return view('partnerTransactions.edit')->with('partnerTransaction', $partnerTransaction);
	}

	/**
	 * Update the specified PartnerTransaction in storage.
	 *
	 * @param  int              $id
	 * @param UpdatePartnerTransactionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatePartnerTransactionRequest $request)
	{
		$partnerTransaction = $this->partnerTransactionRepository->find($id);

		if(empty($partnerTransaction))
		{
			Flash::error('PartnerTransaction not found');

			return redirect(route('partnerTransactions.index'));
		}

		$this->partnerTransactionRepository->updateRich($request->all(), $id);

		Flash::success('PartnerTransaction updated successfully.');

		return redirect(route('partnerTransactions.index'));
	}

	/**
	 * Remove the specified PartnerTransaction from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$partnerTransaction = $this->partnerTransactionRepository->find($id);

		if(empty($partnerTransaction))
		{
			Flash::error('PartnerTransaction not found');

			return redirect(route('partnerTransactions.index'));
		}

		$this->partnerTransactionRepository->delete($id);

		Flash::success('PartnerTransaction deleted successfully.');

		return redirect(route('partnerTransactions.index'));
	}
}
