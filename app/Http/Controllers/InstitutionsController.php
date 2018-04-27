<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\InstitutionCreateRequest;
use App\Http\Requests\InstitutionUpdateRequest;
use App\Repositories\InstitutionRepository;
use App\Validators\InstitutionValidator;
use App\Services\InstitutionService;


/**
 * Class InstitutionsController.
 *
 * @package namespace App\Http\Controllers;
 */
class InstitutionsController extends Controller
{
    /**
     * @var InstitutionRepository
     */
    protected $repository;

    /**
     * @var InstitutionValidator
     */
    protected $validator;

    /**
     * @var InstitutionService
     */
    protected $service;

    /**
     * InstitutionsController constructor.
     *
     * @param InstitutionRepository $repository
     * @param InstitutionValidator $validator
     */
    public function __construct(InstitutionRepository $repository, InstitutionValidator $validator, InstitutionService $service)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutions = $this->repository->all();

        return view('institutions.index', [
          'institutions' => $institutions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  InstitutionCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(InstitutionCreateRequest $request)
    {
      $request = $this->service->store($request->all());
      $institution = $request['success'] ? $request['data'] : null;

      //dd($request);

      session()->flash('success', [
        'success' => $request['success'],
        'message' => $request['message']
      ]);

      return redirect()->route('institution.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $institution = $this->repository->find($id);

        return view('institutions.show', [
          'institution' => $institution
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institution = $this->repository->find($id);

        return view('institutions.edit', [
          'institution' => $institution
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  InstitutionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, $id)
    {
      $request = $this->service->update($request->all(), $id);
      $institution = $request['success'] ? $request['data'] : null;

      //dd($request);

      session()->flash('success', [
        'success' => $request['success'],
        'message' => $request['message']
      ]);

      return redirect()->route('institution.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->route('institution.index');
        }
    }
