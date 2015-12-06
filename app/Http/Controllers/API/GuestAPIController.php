<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\GuestRepository;
use App\Models\Guest;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class GuestAPIController extends AppBaseController
{
	/** @var  GuestRepository */
	private $guestRepository;

	function __construct(GuestRepository $guestRepo)
	{
		$this->guestRepository = $guestRepo;
	}

	/**
	 * Display a listing of the Guest.
	 * GET|HEAD /guests
	 *
	 * @return Response
	 */
	public function index()
	{
		$guests = $this->guestRepository->all();

		return $this->sendResponse($guests->toArray(), "Guests retrieved successfully");
	}

	/**
	 * Show the form for creating a new Guest.
	 * GET|HEAD /guests/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Guest in storage.
	 * POST /guests
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Guest::$rules) > 0)
			$this->validateRequestOrFail($request, Guest::$rules);

		$input = $request->all();

		$guests = $this->guestRepository->create($input);

		return $this->sendResponse($guests->toArray(), "Guest saved successfully");
	}

	/**
	 * Display the specified Guest.
	 * GET|HEAD /guests/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$guest = $this->guestRepository->apiFindOrFail($id);

		return $this->sendResponse($guest->toArray(), "Guest retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Guest.
	 * GET|HEAD /guests/{id}/edit
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		// maybe, you can return a template for JS
//		Errors::throwHttpExceptionWithCode(Errors::EDITION_FORM_NOT_EXISTS, ['id' => $id], static::getHATEOAS(['%id' => $id]));
	}

	/**
	 * Update the specified Guest in storage.
	 * PUT/PATCH /guests/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Guest $guest */
		$guest = $this->guestRepository->apiFindOrFail($id);

		$result = $this->guestRepository->updateRich($input, $id);

		$guest = $guest->fresh();

		return $this->sendResponse($guest->toArray(), "Guest updated successfully");
	}

	/**
	 * Remove the specified Guest from storage.
	 * DELETE /guests/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->guestRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Guest deleted successfully");
	}
}
