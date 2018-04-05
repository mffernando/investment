<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class GroupValidator.
 *
 * @package namespace App\Validators;
 */
class GroupValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
          'name' => 'required',
          'user_id' => 'required|exists:users, id',
          'institution_id' => 'required|exists:institutions, id',
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
