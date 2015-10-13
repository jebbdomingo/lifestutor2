<?php

namespace Lifestutor\Domains\User\Jobs;

use Lifestutor\Foundation\AbstractJob;
use Lifestutor\Data\Entities\User\User;
use EntityManager;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class GetUserJob extends AbstractJob
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle(EntityManager $em)
    {
        $user = $em::getRepository('Lifestutor\Data\Entities\User\User')->find($this->id);

        return $user;
    }
}
