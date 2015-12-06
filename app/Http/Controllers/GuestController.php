<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use App\Libraries\Repositories\GuestRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class GuestController extends AppBaseController
{

	/** @var  GuestRepository */
	private $guestRepository;

	function __construct(GuestRepository $guestRepo)
	{
		$this->guestRepository = $guestRepo;
	}

	/**
	 * Display a listing of the Guest.
	 *
	 * @return Response
	 */
	public function index()
	{
		$guests = $this->guestRepository->paginate(10);

		return view('guests.index')
			->with('guests', $guests);
	}

	/**
	 * Show the form for creating a new Guest.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('guests.create');
	}

	/**
	 * Store a newly created Guest in storage.
	 *
	 * @param CreateGuestRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateGuestRequest $request)
	{
		$input = $request->all();

		$guest = $this->guestRepository->create($input);

		Flash::success('Guest saved successfully.');

		return redirect(route('guests.index'));
	}

	/**
	 * Display the specified Guest.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$guest = $this->guestRepository->find($id);

		if(empty($guest))
		{
			Flash::error('Guest not found');

			return redirect(route('guests.index'));
		}

		return view('guests.show')->with('guest', $guest);
	}

	/**
	 * Show the form for editing the specified Guest.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$guest = $this->guestRepository->find($id);

		if(empty($guest))
		{
			Flash::error('Guest not found');

			return redirect(route('guests.index'));
		}

		return view('guests.edit')->with('guest', $guest);
	}

	/**
	 * Update the specified Guest in storage.
	 *
	 * @param  int              $id
	 * @param UpdateGuestRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateGuestRequest $request)
	{
		$guest = $this->guestRepository->find($id);

		if(empty($guest))
		{
			Flash::error('Guest not found');

			return redirect(route('guests.index'));
		}

		$this->guestRepository->updateRich($request->all(), $id);

		Flash::success('Guest updated successfully.');

		return redirect(route('guests.index'));
	}

	/**
	 * Remove the specified Guest from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$guest = $this->guestRepository->find($id);

		if(empty($guest))
		{
			Flash::error('Guest not found');

			return redirect(route('guests.index'));
		}

		$this->guestRepository->delete($id);

		Flash::success('Guest deleted successfully.');

		return redirect(route('guests.index'));
	}
}
