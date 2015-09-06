<?php

namespace Lifestutor\Foundation;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class Validation
{
    public function make(array $data, array $rules, array $messages = array(), array $customAttributes = array())
    {
        return $this->getValidationFactory()->make($data, $rules, $messages, $customAttributes);
    }

    public function getValidationFactory()
    {
        return app('Illuminate\Contracts\Validation\Factory');
    }
}
