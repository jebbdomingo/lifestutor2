<?php

namespace Lifestutor\Foundation;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class Exception extends \Exception
{
    /**
     * Array of errors
     * 
     * @var array
     */
    private $errors = [];

    /**
     * Set errors array
     * 
     * @param array $errors
     */
    public function setErrors(array $errors)
    {
        $this->errors = $errors;
    }

    /**
     * Get array of errors
     * 
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
