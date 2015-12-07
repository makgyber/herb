<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateFinanceChargeRequest;
use App\Http\Requests\UpdateFinanceChargeRequest;
use App\Libraries\Repositories\FinanceChargeRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class FinanceChargeController extends AppBaseController
{

	/** @var  FinanceChargeRepository */
	private $financeChargeRepository;

	function __construct(FinanceChargeRepository $financeChargeRepo)
	{
		$this->financeChargeRepository = $financeChargeRepo;
	}

	/**
	 * Display a listing of the FinanceCharge.
	 *
	 * @return Response
	 */
	public function index()
	{
		$financeCharges = $this->financeChargeRepository->paginate(10);

		return view('financeCharges.index')
			->with('financeCharges', $financeCharges);
	}

	/**
	 * Show the form for creating a new FinanceCharge.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('financeCharges.create');
	}

	/**
	 * Store a newly created FinanceCharge in storage.
	 *
	 * @param CreateFinanceChargeRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateFinanceChargeRequest $request)
	{
		$input = $request->all();

		$financeCharge = $this->financeChargeRepository->create($input);

		Flash::success('FinanceCharge saved successfully.');

		return redirect(route('financeCharges.index'));
	}

	/**
	 * Display the specified FinanceCharge.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$financeCharge = $this->financeChargeRepository->find($id);

		if(empty($financeCharge))
		{
			Flash::error('FinanceCharge not found');

			return redirect(route('financeCharges.index'));
		}

		return view('financeCharges.show')->with('financeCharge', $financeCharge);
	}

	/**
	 * Show the form for editing the specified FinanceCharge.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$financeCharge = $this->financeChargeRepository->find($id);

		if(empty($financeCharge))
		{
			Flash::error('FinanceCharge not found');

			return redirect(route('financeCharges.index'));
		}

		return view('financeCharges.edit')->with('financeCharge', $financeCharge);
	}

	/**
	 * Update the specified FinanceCharge in storage.
	 *
	 * @param  int              $id
	 * @param UpdateFinanceChargeRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateFinanceChargeRequest $request)
	{
		$financeCharge = $this->financeChargeRepository->find($id);

		if(empty($financeCharge))
		{
			Flash::error('FinanceCharge not found');

			return redirect(route('financeCharges.index'));
		}

		$this->financeChargeRepository->updateRich($request->all(), $id);

		Flash::success('FinanceCharge updated successfully.');

		return redirect(route('financeCharges.index'));
	}

	/**
	 * Remove the specified FinanceCharge from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$financeCharge = $this->financeChargeRepository->find($id);

		if(empty($financeCharge))
		{
			Flash::error('FinanceCharge not found');

			return redirect(route('financeCharges.index'));
		}

		$this->financeChargeRepository->delete($id);

		Flash::success('FinanceCharge deleted successfully.');

		return redirect(route('financeCharges.index'));
	}
}
