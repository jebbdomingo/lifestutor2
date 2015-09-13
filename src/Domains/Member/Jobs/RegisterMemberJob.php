<?php

namespace Lifestutor\Domains\Member\Jobs;

use Lifestutor\Foundation\AbstractJob;
use Lifestutor\Data\Entities\Member\Member;
use EntityManager;
//use Lifestutor\Data\Repositories\CitizenRepository;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class RegisterMemberJob extends AbstractJob
{
    private $first_name;
    private $last_name;
    private $email_address;

    public function __construct($first_name, $last_name, $email_address)
    {
        $this->first_name    = $first_name;
        $this->last_name     = $last_name;
        $this->email_address = $email_address;
    }

    public function handle(EntityManager $em)
    {
        $member = new Member();
        $member->setFirstName($this->first_name);
        $member->setLastName($this->last_name);
        $member->setEmailAddress($this->email_address);

        $em::persist($member);
        $em::flush();

        return $member;
    }
}
