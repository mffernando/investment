<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;

class DashboardController extends Controller
{

  private $repository;
  private $validator;

  public function __construct(UserRepository $repository, UserValidator $validator)
  {
      $this->repository = $repository;
      $this->validator  = $validator;
  }

  //index method
  public function index()
  {
    echo "index";
  }

  //auth method
  public function auth(Request $request)
  {
    //Login
    //true or false: save login in cache
    $data = [
              'email' => $request->get('username'),
              'password' => $request->get('password')
            ];

    try {
          \Auth::attempt($data, false);
          return redirect()->route('user.dashboard');
    } catch (\Exception $e) {
          return $e->getMessage();
    }
  }
}
