<?php

namespace Lifestutor\Domains\Member\Jobs;

use Illuminate\Http\Request;
use Lifestutor\Foundation\AbstractJob;
use Lifestutor\Domains\Member\Validators\MemberCreationValidator as Validator;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class ValidateMemberCreationInputJob extends AbstractJob
{
    public function handle(Validator $validator, Request $request)
    {
        return $validator->validate($request->all());
    }
}
