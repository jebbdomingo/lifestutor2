<?php

namespace Lifestutor\Domains\Member\Jobs;

use Lifestutor\Foundation\AbstractJob;
use Lifestutor\Data\Entities\Member\Member;
use EntityManager;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class GetMemberJob extends AbstractJob
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle(EntityManager $em)
    {
        $member = $em::getRepository('Lifestutor\Data\Entities\Member\Member')->find($this->id);

        return $member;
    }
}
