<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Repositories\ProductRepository;
use App\Validators\ProductValidator;
use App\Entities\Institution;

class ProductsController extends Controller
{
    protected $repository;
    protected $validator;

    public function __construct(ProductRepository $repository, ProductValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function index($institution_id)
    {
      //$products = $this->repository->all();
      //$institution = Institution::find($institution_id);
      //$products = $this->repository->findWhere(['institution_id' => $institution_id]);
      //$products = [];

      //dd($products);
      //dd($institution);

      $institution = Institution::find($institution_id);

      //dd($institution);

      return view('institutions.product.index', [
        'institution' => $institution
      ]);
    }

    public function store(Request $request, $institution_id)
    {
      try
      {
        $data = $request->all();
        $data['institution_id'] = $institution_id;

        $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
        $product = $this->repository->create($data);

        session()->flash('success', [
          'success' => true,
          'messages' => 'Registered Product'
        ]);

        return redirect()->route('institution.product.index', $institution_id);
      }
      catch (ValidatorException $e){
          return redirect()->back()->withErrors($e->getMessageBag())->withInput();
      }
    }

    public function show($id)
    {
        $product = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $product,
            ]);
        }

        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = $this->repository->find($id);

        return view('products.edit', compact('product'));
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $product = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Product updated.',
                'data'    => $product->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function destroy($institution_id, $product_id)
    {
        $deleted = $this->repository->delete($product_id);

        session()->flash('success', [
          'success' => true,
          'message' => "Deleted Product!"
        ]);
        return redirect()->back();
    }
}
