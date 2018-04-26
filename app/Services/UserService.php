<?php

namespace App\Services;

use Illuminate\Database\QueryException;
use Exception;
use Prettus\Validator\Exceptions\ValidatorException;
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
    } catch (Exception $e) {

      switch (get_class($e))
      {
        case QueryException::class      : return ['success' => false, 'message' => $e->getMessage()];
        case ValidatorException::class  : return ['success' => false, 'message' => $e->getMessageBag()];
        case Exception::class           : return ['success' => false, 'message' => $e->getMessage()];
        default                         : return ['success' => false, 'message' => $e->getMessage()];
      }
    }
  }

  public function update($data, $id)
  {
    try {

      $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
      $user = $this->repository->update($data, $id);

      return[
        'success' => true,
        'message' => "Updated User!",
        'data' => $user,
      ];
    } catch (Exception $e) {

      switch (get_class($e))
      {
        case QueryException::class      : return ['success' => false, 'message' => $e->getMessage()];
        case ValidatorException::class  : return ['success' => false, 'message' => $e->getMessageBag()];
        case Exception::class           : return ['success' => false, 'message' => $e->getMessage()];
        default                         : return ['success' => false, 'message' => $e->getMessage()];
      }
    }
  }

  public function destroy($user_id)
  {
    try {

      $this->repository->delete($user_id);

      return[
        'success' => true,
        'message' => "Deleted User!",
        'data' => null,
      ];
    } catch (Exception $e) {

      switch (get_class($e))
      {
        case QueryException::class      : return ['success' => false, 'message' => $e->getMessage()];
        case ValidatorException::class  : return ['success' => false, 'message' => $e->getMessageBag()];
        case Exception::class           : return ['success' => false, 'message' => $e->getMessage()];
        default                         : return ['success' => false, 'message' => $e->getMessage()];
      }
    }
  }
}
