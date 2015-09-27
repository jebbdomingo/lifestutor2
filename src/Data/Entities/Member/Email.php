<?php

namespace Lifestutor\Data\Entities\Member;

use Assert\Assertion;

class Email
{
    /**
     * Email Address
     * 
     * @var string
     */
    private $value = null;

    /**
     * Cosntructor
     * 
     * @param string $value Email Address
     */
    public function __construct($value)
    {
        Assertion::email($value);

        $this->value = $value;
    }
}
