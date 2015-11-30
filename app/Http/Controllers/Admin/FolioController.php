<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\CreateFolioRequest;
use App\Http\Requests\UpdateFolioRequest;
use App\Libraries\Repositories\FolioRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class FolioController extends AppBaseController
{

	/** @var  FolioRepository */
	private $folioRepository;

	function __construct(FolioRepository $folioRepo)
	{
		$this->folioRepository = $folioRepo;
	}

	/**
	 * Display a listing of the Folio.
	 *
	 * @return Response
	 */
	public function index()
	{
		$folios = $this->folioRepository->paginate(10);

		return view('folios.index')
			->with('folios', $folios);
	}

	/**
	 * Show the form for creating a new Folio.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('folios.create');
	}

	/**
	 * Store a newly created Folio in storage.
	 *
	 * @param CreateFolioRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateFolioRequest $request)
	{
		$input = $request->all();

		$folio = $this->folioRepository->create($input);

		Flash::success('Folio saved successfully.');

		return redirect(route('folios.index'));
	}

	/**
	 * Display the specified Folio.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$folio = $this->folioRepository->find($id);

		if(empty($folio))
		{
			Flash::error('Folio not found');

			return redirect(route('folios.index'));
		}

		return view('folios.show')->with('folio', $folio);
	}

	/**
	 * Show the form for editing the specified Folio.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$folio = $this->folioRepository->find($id);

		if(empty($folio))
		{
			Flash::error('Folio not found');

			return redirect(route('folios.index'));
		}

		return view('folios.edit')->with('folio', $folio);
	}

	/**
	 * Update the specified Folio in storage.
	 *
	 * @param  int              $id
	 * @param UpdateFolioRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateFolioRequest $request)
	{
		$folio = $this->folioRepository->find($id);

		if(empty($folio))
		{
			Flash::error('Folio not found');

			return redirect(route('folios.index'));
		}

		$this->folioRepository->updateRich($request->all(), $id);

		Flash::success('Folio updated successfully.');

		return redirect(route('folios.index'));
	}

	/**
	 * Remove the specified Folio from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$folio = $this->folioRepository->find($id);

		if(empty($folio))
		{
			Flash::error('Folio not found');

			return redirect(route('folios.index'));
		}

		$this->folioRepository->delete($id);

		Flash::success('Folio deleted successfully.');

		return redirect(route('folios.index'));
	}
}
