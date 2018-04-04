<?php

namespace App\Services;

use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;

class UserService
{
  private $repository;
  private $validator;

  public function __construct(UserRepository $repository, UserValidator $validator)
  {
    $this->repository = $repository;
    $this->validator = $validator;
  }

  public function store($data)
  {
    try {

      $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
      $user = $this->repository->create($data);

      return[
        'success' => true,
        'message' => "Registered User!",
        'data' => $user,
      ];
    } catch (\Exception $e) {
      return[
        'success' => false,
        'message' => "Execution Error!",
      ];
    }

  }
  
  public function update(){}
  public function delete(){}

}
