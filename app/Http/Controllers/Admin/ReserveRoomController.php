<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\CreateReserveRoomRequest;
use App\Http\Requests\UpdateReserveRoomRequest;
use App\Libraries\Repositories\ReserveRoomRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ReserveRoomController extends AppBaseController
{

	/** @var  ReserveRoomRepository */
	private $reserveRoomRepository;

	function __construct(ReserveRoomRepository $reserveRoomRepo)
	{
		$this->reserveRoomRepository = $reserveRoomRepo;
	}

	/**
	 * Display a listing of the ReserveRoom.
	 *
	 * @return Response
	 */
	public function index()
	{
		$reserveRooms = $this->reserveRoomRepository->paginate(10);

		return view('reserveRooms.index')
			->with('reserveRooms', $reserveRooms);
	}

	/**
	 * Show the form for creating a new ReserveRoom.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('reserveRooms.create');
	}

	/**
	 * Store a newly created ReserveRoom in storage.
	 *
	 * @param CreateReserveRoomRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateReserveRoomRequest $request)
	{
		$input = $request->all();

		$reserveRoom = $this->reserveRoomRepository->create($input);

		Flash::success('ReserveRoom saved successfully.');

		return redirect(route('reserveRooms.index'));
	}

	/**
	 * Display the specified ReserveRoom.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$reserveRoom = $this->reserveRoomRepository->find($id);

		if(empty($reserveRoom))
		{
			Flash::error('ReserveRoom not found');

			return redirect(route('reserveRooms.index'));
		}

		return view('reserveRooms.show')->with('reserveRoom', $reserveRoom);
	}

	/**
	 * Show the form for editing the specified ReserveRoom.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$reserveRoom = $this->reserveRoomRepository->find($id);

		if(empty($reserveRoom))
		{
			Flash::error('ReserveRoom not found');

			return redirect(route('reserveRooms.index'));
		}

		return view('reserveRooms.edit')->with('reserveRoom', $reserveRoom);
	}

	/**
	 * Update the specified ReserveRoom in storage.
	 *
	 * @param  int              $id
	 * @param UpdateReserveRoomRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateReserveRoomRequest $request)
	{
		$reserveRoom = $this->reserveRoomRepository->find($id);

		if(empty($reserveRoom))
		{
			Flash::error('ReserveRoom not found');

			return redirect(route('reserveRooms.index'));
		}

		$this->reserveRoomRepository->updateRich($request->all(), $id);

		Flash::success('ReserveRoom updated successfully.');

		return redirect(route('reserveRooms.index'));
	}

	/**
	 * Remove the specified ReserveRoom from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$reserveRoom = $this->reserveRoomRepository->find($id);

		if(empty($reserveRoom))
		{
			Flash::error('ReserveRoom not found');

			return redirect(route('reserveRooms.index'));
		}

		$this->reserveRoomRepository->delete($id);

		Flash::success('ReserveRoom deleted successfully.');

		return redirect(route('reserveRooms.index'));
	}
}
