<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;
use Auth;

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
    return view('user.dashboard');
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
      //true
      if(env('PASSWORD_HASH')){
      Auth::attempt($data, false);
      }
      //false
      else
      {
      $user = $this->repository->findWhere(['email' => $request->get('username')])->first();

      //check e-mail
      if(!$user) //not authenticated
        throw new Exception("Wrong E-mail!");

      //check password
      if($user->password != $request->get('password'))
        throw new Exception("Wrong Password!");

      //Auth
      Auth::login($user);
      }

      return redirect()->route('user.dashboard');
    }
    catch (Exception $e) {
          return $e->getMessage();
    }
  }
}
