<?php

namespace Lifestutor\Domains\Member\Validators;

use Lifestutor\Foundation\Validator;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class MemberCreationValidator extends Validator
{
    protected $rules = [
        'first_name' => 'required',
        'last_name'  => 'required',
        'email'      => 'email',
    ];
}
