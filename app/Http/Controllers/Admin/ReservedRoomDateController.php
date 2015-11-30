<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\CreateReservedRoomDateRequest;
use App\Http\Requests\UpdateReservedRoomDateRequest;
use App\Libraries\Repositories\ReservedRoomDateRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ReservedRoomDateController extends AppBaseController
{

	/** @var  ReservedRoomDateRepository */
	private $reservedRoomDateRepository;

	function __construct(ReservedRoomDateRepository $reservedRoomDateRepo)
	{
		$this->reservedRoomDateRepository = $reservedRoomDateRepo;
	}

	/**
	 * Display a listing of the ReservedRoomDate.
	 *
	 * @return Response
	 */
	public function index()
	{
		$reservedRoomDates = $this->reservedRoomDateRepository->paginate(10);

		return view('reservedRoomDates.index')
			->with('reservedRoomDates', $reservedRoomDates);
	}

	/**
	 * Show the form for creating a new ReservedRoomDate.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('reservedRoomDates.create');
	}

	/**
	 * Store a newly created ReservedRoomDate in storage.
	 *
	 * @param CreateReservedRoomDateRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateReservedRoomDateRequest $request)
	{
		$input = $request->all();

		$reservedRoomDate = $this->reservedRoomDateRepository->create($input);

		Flash::success('ReservedRoomDate saved successfully.');

		return redirect(route('reservedRoomDates.index'));
	}

	/**
	 * Display the specified ReservedRoomDate.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$reservedRoomDate = $this->reservedRoomDateRepository->find($id);

		if(empty($reservedRoomDate))
		{
			Flash::error('ReservedRoomDate not found');

			return redirect(route('reservedRoomDates.index'));
		}

		return view('reservedRoomDates.show')->with('reservedRoomDate', $reservedRoomDate);
	}

	/**
	 * Show the form for editing the specified ReservedRoomDate.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$reservedRoomDate = $this->reservedRoomDateRepository->find($id);

		if(empty($reservedRoomDate))
		{
			Flash::error('ReservedRoomDate not found');

			return redirect(route('reservedRoomDates.index'));
		}

		return view('reservedRoomDates.edit')->with('reservedRoomDate', $reservedRoomDate);
	}

	/**
	 * Update the specified ReservedRoomDate in storage.
	 *
	 * @param  int              $id
	 * @param UpdateReservedRoomDateRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateReservedRoomDateRequest $request)
	{
		$reservedRoomDate = $this->reservedRoomDateRepository->find($id);

		if(empty($reservedRoomDate))
		{
			Flash::error('ReservedRoomDate not found');

			return redirect(route('reservedRoomDates.index'));
		}

		$this->reservedRoomDateRepository->updateRich($request->all(), $id);

		Flash::success('ReservedRoomDate updated successfully.');

		return redirect(route('reservedRoomDates.index'));
	}

	/**
	 * Remove the specified ReservedRoomDate from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$reservedRoomDate = $this->reservedRoomDateRepository->find($id);

		if(empty($reservedRoomDate))
		{
			Flash::error('ReservedRoomDate not found');

			return redirect(route('reservedRoomDates.index'));
		}

		$this->reservedRoomDateRepository->delete($id);

		Flash::success('ReservedRoomDate deleted successfully.');

		return redirect(route('reservedRoomDates.index'));
	}
}
