<?php

namespace Lifestutor\Domains\User\Jobs;

use Lifestutor\Foundation\AbstractJob;
use Lifestutor\Data\Entities\User\User;
use EntityManager;
//use Lifestutor\Data\Repositories\CitizenRepository;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class RegisterUserJob extends AbstractJob
{
    private $first_name;
    private $last_name;
    private $email_address;

    public function __construct($first_name, $last_name, $email_address, $password)
    {
        $this->first_name    = $first_name;
        $this->last_name     = $last_name;
        $this->email_address = $email_address;
        $this->password      = $password;
    }

    public function handle(EntityManager $em)
    {
        $user = new User();
        $user->setFirstName($this->first_name);
        $user->setLastName($this->last_name);
        $user->setEmailAddress($this->email_address);
        $user->setPassword(bcrypt($this->password));

        $em::persist($user);
        $em::flush();

        return $user;
    }
}
