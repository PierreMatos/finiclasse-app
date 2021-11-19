<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBenefitRequest;
use App\Http\Requests\UpdateBenefitRequest;
use App\Repositories\BenefitRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Benefit;
use Illuminate\Http\Request;
use Flash;
use Response;
use Spatie\MediaLibrary\Support\MediaStream;

class BenefitController extends AppBaseController
{
    /** @var  BenefitRepository */
    private $benefitRepository;

    public function __construct(BenefitRepository $benefitRepo)
    {
        $this->benefitRepository = $benefitRepo;
    }

    /**
     * Display a listing of the Benefit.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $benefits = $this->benefitRepository->all();

        return view('benefits.index')
            ->with('benefits', $benefits);
    }

    /**
     * Show the form for creating a new Benefit.
     *
     * @return Response
     */
    public function create()
    {
        return view('benefits.create');
    }

    /**
     * Store a newly created Benefit in storage.
     *
     * @param CreateBenefitRequest $request
     *
     * @return Response
     */
    public function store(CreateBenefitRequest $request)
    {
        $input = $request->all();

        $document = $request->file('document');

        if ($request->hasFile('document') == null) {
            //Passar a variable input sem colocar nova imagem
            $input = $request->all();
            $benefit = $this->benefitRepository->create($input);
        } else {
            //Actualizar imagem se colocar uma nova
            $input = $request->all();
            $benefit = $this->benefitRepository->create($input);
            $benefit->addMedia($document)->toMediaCollection('benefits','s3');
        }

        Flash::success(__('translation.benefit saved'));

        return redirect(route('benefits.index'));
    }

    /**
     * Display the specified Benefit.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $benefit = $this->benefitRepository->find($id);

        if (empty($benefit)) {
            Flash::error(__('translation.benefit not found'));

            return redirect(route('benefits.index'));
        }

        return view('benefits.show')->with('benefit', $benefit);
    }

    /**
     * Show the form for editing the specified Benefit.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $benefit = $this->benefitRepository->find($id);

        if (empty($benefit)) {
            Flash::error(__('translation.benefit not found'));

            return redirect(route('benefits.index'));
        }

        return view('benefits.edit')->with('benefit', $benefit);
    }

    /**
     * Update the specified Benefit in storage.
     *
     * @param int $id
     * @param UpdateBenefitRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBenefitRequest $request)
    {
        $benefit = $this->benefitRepository->find($id);

        //Apagar imagem antiga se for mudada  
        if ($request->hasFile('document')) {
            $benefit->clearMediaCollection('benefits');
        }

        //Verificar se o file existe
        $document = $request->file('document');

        if ($request->hasFile('document') == null) {
            //Passar a variable input sem colocar nova imagem
            $input = $request->all();
        } else {
            //Actualizar imagem se colocar uma nova
            $input = $request->all();
            $benefit->addMedia($document)->toMediaCollection('benefits');
        }

        if (empty($benefit)) {
            Flash::error(__('translation.benefit not found'));

            return redirect(route('benefits.index'));
        }

        $benefit = $this->benefitRepository->update($input, $id);

        Flash::success(__('translation.benefit updated'));

        return redirect(route('benefits.index'));
    }

    /**
     * Remove the specified Benefit from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $benefit = $this->benefitRepository->find($id);

        if (empty($benefit)) {
            Flash::error(__('translation.benefit not found'));

            return redirect(route('benefits.index'));
        }

        $this->benefitRepository->delete($id);
        $benefit->clearMediaCollection('benefits');

        Flash::success(__('translation.benefit deleted'));

        return redirect(route('benefits.index'));
    }

    public function download(Benefit $benefit, $id)
    {
        $benefit = $this->benefitRepository->find($id);

        // Let's get some media.
        $downloads = $benefit->getMedia('benefits');

        // Download the files associated with the media in a streamed way.
        // No prob if your files are very large.
        return MediaStream::create('files.zip')->addMedia($downloads);
    }
}
