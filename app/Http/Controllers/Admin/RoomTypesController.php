<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\CreateRoomTypesRequest;
use App\Http\Requests\UpdateRoomTypesRequest;
use App\Libraries\Repositories\RoomTypesRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class RoomTypesController extends AppBaseController
{

	/** @var  RoomTypesRepository */
	private $roomTypesRepository;

	function __construct(RoomTypesRepository $roomTypesRepo)
	{
		$this->roomTypesRepository = $roomTypesRepo;
	}

	/**
	 * Display a listing of the RoomTypes.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roomTypes = $this->roomTypesRepository->paginate(10);

		return view('admin.roomTypes.index')
			->with('roomTypes', $roomTypes);
	}

	/**
	 * Show the form for creating a new RoomTypes.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.roomTypes.create');
	}

	/**
	 * Store a newly created RoomTypes in storage.
	 *
	 * @param CreateRoomTypesRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateRoomTypesRequest $request)
	{
		$input = $request->all();

		$roomTypes = $this->roomTypesRepository->create($input);

		Flash::success('RoomTypes saved successfully.');

		return redirect(route('admin.roomTypes.index'));
	}

	/**
	 * Display the specified RoomTypes.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$roomTypes = $this->roomTypesRepository->find($id);

		if(empty($roomTypes))
		{
			Flash::error('RoomTypes not found');

			return redirect(route('admin.roomTypes.index'));
		}

		return view('admin.roomTypes.show')->with('roomTypes', $roomTypes);
	}

	/**
	 * Show the form for editing the specified RoomTypes.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$roomTypes = $this->roomTypesRepository->find($id);

		if(empty($roomTypes))
		{
			Flash::error('RoomTypes not found');

			return redirect(route('admin.roomTypes.index'));
		}

		return view('admin.roomTypes.edit')->with('roomTypes', $roomTypes);
	}

	/**
	 * Update the specified RoomTypes in storage.
	 *
	 * @param  int              $id
	 * @param UpdateRoomTypesRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateRoomTypesRequest $request)
	{
		$roomTypes = $this->roomTypesRepository->find($id);

		if(empty($roomTypes))
		{
			Flash::error('RoomTypes not found');

			return redirect(route('admin.roomTypes.index'));
		}

		$this->roomTypesRepository->updateRich($request->all(), $id);

		Flash::success('RoomTypes updated successfully.');

		return redirect(route('admin.roomTypes.index'));
	}

	/**
	 * Remove the specified RoomTypes from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$roomTypes = $this->roomTypesRepository->find($id);

		if(empty($roomTypes))
		{
			Flash::error('RoomTypes not found');

			return redirect(route('admin.roomTypes.index'));
		}

		$this->roomTypesRepository->delete($id);

		Flash::success('RoomTypes deleted successfully.');

		return redirect(route('admin.roomTypes.index'));
	}
}
