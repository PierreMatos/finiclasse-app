<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Models\Financing;
use Illuminate\Http\Request;
use App\Repositories\FinancingRepository;
use App\Http\Controllers\AppBaseController;
use Spatie\MediaLibrary\Support\MediaStream;
use App\Http\Requests\CreateFinancingRequest;
use App\Http\Requests\UpdateFinancingRequest;

class FinancingController extends AppBaseController
{
    /** @var  FinancingRepository */
    private $financingRepository;

    public function __construct(FinancingRepository $financingRepo)
    {
        $this->financingRepository = $financingRepo;
    }

    /**
     * Display a listing of the Financing.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $financings = $this->financingRepository->all();

        return view('financings.index')
            ->with('financings', $financings);
    }

    /**
     * Show the form for creating a new Financing.
     *
     * @return Response
     */
    public function create()
    {
        return view('financings.create');
    }

    /**
     * Store a newly created Financing in storage.
     *
     * @param CreateFinancingRequest $request
     *
     * @return Response
     */
    public function store(CreateFinancingRequest $request)
    {
        $input = $request->all();

        $document = $request->file('document');

        if ($request->hasFile('document') == null) {
            //Passar a variable input sem colocar nova imagem
            $input = $request->all();
        } else {
            //Actualizar imagem se colocar uma nova
            $input = $request->all();
            $financing = $this->financingRepository->create($input);
            $financing->addMedia($document)->toMediaCollection('financing');
        }

        $financing = $this->financingRepository->create($input);

        Flash::success('Financing saved successfully.');

        return redirect(route('financings.index'));
    }

    /**
     * Display the specified Financing.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $financing = $this->financingRepository->find($id);

        if (empty($financing)) {
            Flash::error('Financing not found');

            return redirect(route('financings.index'));
        }

        return view('financings.show')->with('financing', $financing);
    }

    /**
     * Show the form for editing the specified Financing.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $financing = $this->financingRepository->find($id);

        if (empty($financing)) {
            Flash::error('Financing not found');

            return redirect(route('financings.index'));
        }

        return view('financings.edit')->with('financing', $financing);
    }

    /**
     * Update the specified Financing in storage.
     *
     * @param int $id
     * @param UpdateFinancingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFinancingRequest $request)
    {
        $financing = $this->financingRepository->find($id);

        //Apagar imagem antiga se for mudada  
        if ($request->hasFile('document')) {
            $financing->clearMediaCollection('financing');
        }

        //Verificar se o file existe
        $document = $request->file('document');

        if ($request->hasFile('document') == null) {
            //Passar a variable input sem colocar nova imagem
            $input = $request->all();
        } else {
            //Actualizar imagem se colocar uma nova
            $input = $request->all();
            $financing->addMedia($document)->toMediaCollection('financing');
        }

        if (empty($financing)) {
            Flash::error('Financing not found');

            return redirect(route('financings.index'));
        }

        $financing = $this->financingRepository->update($input, $id);

        Flash::success('Financing updated successfully.');

        return redirect(route('financings.index'));
    }

    /**
     * Remove the specified Financing from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $financing = $this->financingRepository->find($id);

        if (empty($financing)) {
            Flash::error('Financing not found');

            return redirect(route('financings.index'));
        }

        $this->financingRepository->delete($id);
        $financing->clearMediaCollection('financing');

        Flash::success('Financing deleted successfully.');

        return redirect(route('financings.index'));
    }

    public function download(Financing $financing, $id)
    {
        $financing = $this->financingRepository->find($id);

        // Let's get some media.
        $downloads = $financing->getMedia('financing');

        // Download the files associated with the media in a streamed way.
        // No prob if your files are very large.
        return MediaStream::create('files.zip')->addMedia($downloads);
    }
}
