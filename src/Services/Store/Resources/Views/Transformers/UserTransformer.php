<?php

namespace Lifestutor\Services\Store\Resources\Views\Transformers;

use League\Fractal\TransformerAbstract;
use Lifestutor\Data\Entities\User\User;

class UserTransformer extends TransformerAbstract {

    public function transform(User $user)
    {
        return [
            'id'             => (int) $user->getId(),
            'first_name'     => $user->getFirstName(),
            'last_name'      => $user->getLastName(),
            'email_address'  => $user->getEmailAddress(),
            'published'      => (boolean) 1,
            'date_published' => 'September 13, 2015',
            'active'         => (int) 1
        ];
    }
}
