<?php

namespace App\Services;

use Illuminate\Database\QueryException;
use Exception;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\GroupRepository;
use App\Validators\GroupValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Exceptions;

class GroupService
{
  private $repository;
  private $validator;

  public function __construct(GroupRepository $repository, GroupValidator $validator)
  {
    $this->repository = $repository;
    $this->validator = $validator;
  }

  public function store(array $data) : array
  {
    try {

      $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
      $group = $this->repository->create($data);

      return[
        'success' => true,
        'message' => "Registered Group!",
        'data' => $group,
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

  public function userStore($group_id, $data)
  {
    try {
      $group = $this->repository->find($group_id);
      $user_id = $data['user_id'];

      $group->users()->attach($user_id);
      //dd($group);
      //dd($group->users);

      return[
        'success' => true,
        'message' => "Associated User Successfully!",
        'data' => $group,
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
