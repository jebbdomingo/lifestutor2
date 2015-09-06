<?php

namespace Lifestutor\Domains\Member\Jobs;

use Lifestutor\Foundation\AbstractJob;
use Lifestutor\Data\Repositories\CitizenRepository;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class RegisterMemberJob extends AbstractJob
{
    private $first_name;
    private $last_name;
    private $email;

    public function __construct($first_name, $last_name, $email)
    {
        $this->first_name = $first_name;
        $this->last_name  = $last_name;
        $this->email      = $email;
    }

    public function handle(CitizenRepository $citizens)
    {
        return $citizens->register(
            $this->first_name,
            $this->last_name,
            $this->email,
        );
    }
}
