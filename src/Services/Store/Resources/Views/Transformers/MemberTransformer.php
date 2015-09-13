<?php

namespace Lifestutor\Services\Store\Resources\Views\Transformers;

use League\Fractal\TransformerAbstract;
use Lifestutor\Data\Entities\Member\Member;

class MemberTransformer extends TransformerAbstract {

    public function transform(Member $member)
    {
        return [
            'id'             => (int) $member->getId(),
            'first_name'     => $member->getFirstName(),
            'last_name'      => $member->getLastName(),
            'email_address'  => $member->getEmailAddress(),
            'published'      => (boolean) 1,
            'date_published' => 'September 13, 2015',
            'active'         => (int) 1
        ];
    }
}
