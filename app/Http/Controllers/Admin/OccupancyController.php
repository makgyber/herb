<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\CreateOccupancyRequest;
use App\Http\Requests\UpdateOccupancyRequest;
use App\Libraries\Repositories\OccupancyRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class OccupancyController extends AppBaseController
{

	/** @var  OccupancyRepository */
	private $occupancyRepository;

	function __construct(OccupancyRepository $occupancyRepo)
	{
		$this->occupancyRepository = $occupancyRepo;
	}

	/**
	 * Display a listing of the Occupancy.
	 *
	 * @return Response
	 */
	public function index()
	{
		$occupancies = $this->occupancyRepository->paginate(10);

		return view('occupancies.index')
			->with('occupancies', $occupancies);
	}

	/**
	 * Show the form for creating a new Occupancy.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('occupancies.create');
	}

	/**
	 * Store a newly created Occupancy in storage.
	 *
	 * @param CreateOccupancyRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateOccupancyRequest $request)
	{
		$input = $request->all();

		$occupancy = $this->occupancyRepository->create($input);

		Flash::success('Occupancy saved successfully.');

		return redirect(route('occupancies.index'));
	}

	/**
	 * Display the specified Occupancy.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$occupancy = $this->occupancyRepository->find($id);

		if(empty($occupancy))
		{
			Flash::error('Occupancy not found');

			return redirect(route('occupancies.index'));
		}

		return view('occupancies.show')->with('occupancy', $occupancy);
	}

	/**
	 * Show the form for editing the specified Occupancy.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$occupancy = $this->occupancyRepository->find($id);

		if(empty($occupancy))
		{
			Flash::error('Occupancy not found');

			return redirect(route('occupancies.index'));
		}

		return view('occupancies.edit')->with('occupancy', $occupancy);
	}

	/**
	 * Update the specified Occupancy in storage.
	 *
	 * @param  int              $id
	 * @param UpdateOccupancyRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateOccupancyRequest $request)
	{
		$occupancy = $this->occupancyRepository->find($id);

		if(empty($occupancy))
		{
			Flash::error('Occupancy not found');

			return redirect(route('occupancies.index'));
		}

		$this->occupancyRepository->updateRich($request->all(), $id);

		Flash::success('Occupancy updated successfully.');

		return redirect(route('occupancies.index'));
	}

	/**
	 * Remove the specified Occupancy from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$occupancy = $this->occupancyRepository->find($id);

		if(empty($occupancy))
		{
			Flash::error('Occupancy not found');

			return redirect(route('occupancies.index'));
		}

		$this->occupancyRepository->delete($id);

		Flash::success('Occupancy deleted successfully.');

		return redirect(route('occupancies.index'));
	}
}
