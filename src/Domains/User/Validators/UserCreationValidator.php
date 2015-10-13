<?php

namespace Lifestutor\Domains\User\Validators;

use Lifestutor\Foundation\Validator;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class UserCreationValidator extends Validator
{
    protected $rules = [
        'first_name' => 'required',
        'last_name'  => 'required',
        'email'      => 'email',
    ];
}
