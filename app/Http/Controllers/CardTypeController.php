<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCardTypeRequest;
use App\Http\Requests\UpdateCardTypeRequest;
use App\Libraries\Repositories\CardTypeRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class CardTypeController extends AppBaseController
{

	/** @var  CardTypeRepository */
	private $cardTypeRepository;

	function __construct(CardTypeRepository $cardTypeRepo)
	{
		$this->cardTypeRepository = $cardTypeRepo;
	}

	/**
	 * Display a listing of the CardType.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cardTypes = $this->cardTypeRepository->paginate(10);

		return view('cardTypes.index')
			->with('cardTypes', $cardTypes);
	}

	/**
	 * Show the form for creating a new CardType.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cardTypes.create');
	}

	/**
	 * Store a newly created CardType in storage.
	 *
	 * @param CreateCardTypeRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCardTypeRequest $request)
	{
		$input = $request->all();

		$cardType = $this->cardTypeRepository->create($input);

		Flash::success('CardType saved successfully.');

		return redirect(route('cardTypes.index'));
	}

	/**
	 * Display the specified CardType.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$cardType = $this->cardTypeRepository->find($id);

		if(empty($cardType))
		{
			Flash::error('CardType not found');

			return redirect(route('cardTypes.index'));
		}

		return view('cardTypes.show')->with('cardType', $cardType);
	}

	/**
	 * Show the form for editing the specified CardType.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$cardType = $this->cardTypeRepository->find($id);

		if(empty($cardType))
		{
			Flash::error('CardType not found');

			return redirect(route('cardTypes.index'));
		}

		return view('cardTypes.edit')->with('cardType', $cardType);
	}

	/**
	 * Update the specified CardType in storage.
	 *
	 * @param  int              $id
	 * @param UpdateCardTypeRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateCardTypeRequest $request)
	{
		$cardType = $this->cardTypeRepository->find($id);

		if(empty($cardType))
		{
			Flash::error('CardType not found');

			return redirect(route('cardTypes.index'));
		}

		$this->cardTypeRepository->updateRich($request->all(), $id);

		Flash::success('CardType updated successfully.');

		return redirect(route('cardTypes.index'));
	}

	/**
	 * Remove the specified CardType from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$cardType = $this->cardTypeRepository->find($id);

		if(empty($cardType))
		{
			Flash::error('CardType not found');

			return redirect(route('cardTypes.index'));
		}

		$this->cardTypeRepository->delete($id);

		Flash::success('CardType deleted successfully.');

		return redirect(route('cardTypes.index'));
	}
}
