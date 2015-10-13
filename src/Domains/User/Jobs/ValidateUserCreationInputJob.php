<?php

namespace Lifestutor\Domains\User\Jobs;

use Illuminate\Http\Request;
use Lifestutor\Foundation\AbstractJob;
use Lifestutor\Domains\User\Validators\UserCreationValidator as Validator;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class ValidateUserCreationInputJob extends AbstractJob
{
    public function handle(Validator $validator, Request $request)
    {
        return $validator->validate($request->all());
    }
}
