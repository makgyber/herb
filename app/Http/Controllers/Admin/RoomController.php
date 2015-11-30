<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\CreateRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Libraries\Repositories\RoomRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class RoomController extends AppBaseController
{

	/** @var  RoomRepository */
	private $roomRepository;

	function __construct(RoomRepository $roomRepo)
	{
		$this->roomRepository = $roomRepo;
	}

	/**
	 * Display a listing of the Room.
	 *
	 * @return Response
	 */
	public function index()
	{
		$rooms = $this->roomRepository->paginate(10);

		return view('admin.rooms.index')
			->with('rooms', $rooms);
	}

	/**
	 * Show the form for creating a new Room.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.rooms.create');
	}

	/**
	 * Store a newly created Room in storage.
	 *
	 * @param CreateRoomRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateRoomRequest $request)
	{
		$input = $request->all();

		$room = $this->roomRepository->create($input);

		Flash::success('Room saved successfully.');

		return redirect(route('admin.rooms.index'));
	}

	/**
	 * Display the specified Room.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$room = $this->roomRepository->find($id);

		if(empty($room))
		{
			Flash::error('Room not found');

			return redirect(route('admin.rooms.index'));
		}

		return view('admin.rooms.show')->with('room', $room);
	}

	/**
	 * Show the form for editing the specified Room.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$room = $this->roomRepository->find($id);

		if(empty($room))
		{
			Flash::error('Room not found');

			return redirect(route('admin.rooms.index'));
		}

		return view('admin.rooms.edit')->with('room', $room);
	}

	/**
	 * Update the specified Room in storage.
	 *
	 * @param  int              $id
	 * @param UpdateRoomRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateRoomRequest $request)
	{
		$room = $this->roomRepository->find($id);

		if(empty($room))
		{
			Flash::error('Room not found');

			return redirect(route('admin.rooms.index'));
		}

		$this->roomRepository->updateRich($request->all(), $id);

		Flash::success('Room updated successfully.');

		return redirect(route('admin.rooms.index'));
	}

	/**
	 * Remove the specified Room from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$room = $this->roomRepository->find($id);

		if(empty($room))
		{
			Flash::error('Room not found');

			return redirect(route('admin.rooms.index'));
		}

		$this->roomRepository->delete($id);

		Flash::success('Room deleted successfully.');

		return redirect(route('admin.rooms.index'));
	}
}
