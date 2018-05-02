<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MovimentCreateRequest;
use App\Http\Requests\MovimentUpdateRequest;
use App\Repositories\MovimentRepository;
use App\Validators\MovimentValidator;
use App\Entities\{Group, Product};
use Auth;

class MovimentsController extends Controller
{
    protected $repository;
    protected $validator;

    public function __construct(MovimentRepository $repository, MovimentValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function application()
    {
      //dd(Auth::user());

      $user = Auth::user();
      //dd($user->groups->pluck('name', 'id'));

      $group_list = $user->groups->pluck('name', 'id');
      //$group_list = Group::all()->pluck('name', 'id');
      $product_list = Product::all()->pluck('name', 'id');

      return view ('moviment.application', [
        'group_list' => $group_list,
        'product_list' => $product_list,
      ]);
    }
}
