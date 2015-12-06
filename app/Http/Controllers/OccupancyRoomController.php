<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateOccupancyRoomRequest;
use App\Http\Requests\UpdateOccupancyRoomRequest;
use App\Libraries\Repositories\OccupancyRoomRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class OccupancyRoomController extends AppBaseController
{

	/** @var  OccupancyRoomRepository */
	private $occupancyRoomRepository;

	function __construct(OccupancyRoomRepository $occupancyRoomRepo)
	{
		$this->occupancyRoomRepository = $occupancyRoomRepo;
	}

	/**
	 * Display a listing of the OccupancyRoom.
	 *
	 * @return Response
	 */
	public function index()
	{
		$occupancyRooms = $this->occupancyRoomRepository->paginate(10);

		return view('occupancyRooms.index')
			->with('occupancyRooms', $occupancyRooms);
	}

	/**
	 * Show the form for creating a new OccupancyRoom.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('occupancyRooms.create');
	}

	/**
	 * Store a newly created OccupancyRoom in storage.
	 *
	 * @param CreateOccupancyRoomRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateOccupancyRoomRequest $request)
	{
		$input = $request->all();

		$occupancyRoom = $this->occupancyRoomRepository->create($input);

		Flash::success('OccupancyRoom saved successfully.');

		return redirect(route('occupancyRooms.index'));
	}

	/**
	 * Display the specified OccupancyRoom.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$occupancyRoom = $this->occupancyRoomRepository->find($id);

		if(empty($occupancyRoom))
		{
			Flash::error('OccupancyRoom not found');

			return redirect(route('occupancyRooms.index'));
		}

		return view('occupancyRooms.show')->with('occupancyRoom', $occupancyRoom);
	}

	/**
	 * Show the form for editing the specified OccupancyRoom.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$occupancyRoom = $this->occupancyRoomRepository->find($id);

		if(empty($occupancyRoom))
		{
			Flash::error('OccupancyRoom not found');

			return redirect(route('occupancyRooms.index'));
		}

		return view('occupancyRooms.edit')->with('occupancyRoom', $occupancyRoom);
	}

	/**
	 * Update the specified OccupancyRoom in storage.
	 *
	 * @param  int              $id
	 * @param UpdateOccupancyRoomRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateOccupancyRoomRequest $request)
	{
		$occupancyRoom = $this->occupancyRoomRepository->find($id);

		if(empty($occupancyRoom))
		{
			Flash::error('OccupancyRoom not found');

			return redirect(route('occupancyRooms.index'));
		}

		$this->occupancyRoomRepository->updateRich($request->all(), $id);

		Flash::success('OccupancyRoom updated successfully.');

		return redirect(route('occupancyRooms.index'));
	}

	/**
	 * Remove the specified OccupancyRoom from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$occupancyRoom = $this->occupancyRoomRepository->find($id);

		if(empty($occupancyRoom))
		{
			Flash::error('OccupancyRoom not found');

			return redirect(route('occupancyRooms.index'));
		}

		$this->occupancyRoomRepository->delete($id);

		Flash::success('OccupancyRoom deleted successfully.');

		return redirect(route('occupancyRooms.index'));
	}
}
