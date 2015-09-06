<?php

namespace Lifestutor\Foundation;

use Lifestutor\Foundation\Exception as LifestutorException;
use Illuminate\Validation\Validator as IlluminateValidator;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class InvalidInputException extends LifestutorException
{
    public function __construct($message = '', $code = 0, \Exception $previous = null)
    {
        if ($message instanceof IlluminateValidator) {
            //print_r(get_class_methods($message->messages()));die;
            $message = $message->messages()->toArray();

            $this->setErrors($message);
        } elseif (is_array($message)) {
            $message = implode("\n", $message);
            parent::__construct($message, $code, $previous);
        } else {
            parent::__construct($message, $code, $previous);
        }
    }
}
