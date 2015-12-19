<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePartnerDiscountRequest;
use App\Http\Requests\UpdatePartnerDiscountRequest;
use App\Libraries\Repositories\PartnerDiscountRepository;
use App\Models\Partner;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PartnerDiscountController extends AppBaseController
{

	/** @var  PartnerDiscountRepository */
	private $partnerDiscountRepository;

	function __construct(PartnerDiscountRepository $partnerDiscountRepo)
	{
		$this->partnerDiscountRepository = $partnerDiscountRepo;
	}

	/**
	 * Display a listing of the PartnerDiscount.
	 *
	 * @return Response
	 */
	public function index()
	{
		$partnerDiscounts = $this->partnerDiscountRepository->paginate(10);

		return view('partnerDiscounts.index')
			->with('partnerDiscounts', $partnerDiscounts);
	}

	/**
	 * Show the form for creating a new PartnerDiscount.
	 *
	 * @return Response
	 */
	public function create()
	{
		$partners = Partner::lists('partner_name', 'partner_id');
		return view('partnerDiscounts.create', compact('partners'));
	}

	/**
	 * Store a newly created PartnerDiscount in storage.
	 *
	 * @param CreatePartnerDiscountRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePartnerDiscountRequest $request)
	{
		$input = $request->all();

		$partnerDiscount = $this->partnerDiscountRepository->create($input);

		Flash::success('PartnerDiscount saved successfully.');

		return redirect(route('partnerDiscounts.index'));
	}

	/**
	 * Display the specified PartnerDiscount.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$partnerDiscount = $this->partnerDiscountRepository->find($id);

		if(empty($partnerDiscount))
		{
			Flash::error('PartnerDiscount not found');

			return redirect(route('partnerDiscounts.index'));
		}

		return view('partnerDiscounts.show')->with('partnerDiscount', $partnerDiscount);
	}

	/**
	 * Show the form for editing the specified PartnerDiscount.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$partnerDiscount = $this->partnerDiscountRepository->find($id);
		$partners = Partner::lists('partner_name', 'partner_id');

		if(empty($partnerDiscount))
		{
			Flash::error('PartnerDiscount not found');

			return redirect(route('partnerDiscounts.index'));
		}

		return view('partnerDiscounts.edit')->with('partnerDiscount', $partnerDiscount)->with('partners', $partners);
	}

	/**
	 * Update the specified PartnerDiscount in storage.
	 *
	 * @param  int              $id
	 * @param UpdatePartnerDiscountRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatePartnerDiscountRequest $request)
	{
		$partnerDiscount = $this->partnerDiscountRepository->find($id);

		if(empty($partnerDiscount))
		{
			Flash::error('PartnerDiscount not found');

			return redirect(route('partnerDiscounts.index'));
		}

		$this->partnerDiscountRepository->updateRich($request->all(), $id);

		Flash::success('PartnerDiscount updated successfully.');

		return redirect(route('partnerDiscounts.index'));
	}

	/**
	 * Remove the specified PartnerDiscount from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$partnerDiscount = $this->partnerDiscountRepository->find($id);

		if(empty($partnerDiscount))
		{
			Flash::error('PartnerDiscount not found');

			return redirect(route('partnerDiscounts.index'));
		}

		$this->partnerDiscountRepository->delete($id);

		Flash::success('PartnerDiscount deleted successfully.');

		return redirect(route('partnerDiscounts.index'));
	}
}
