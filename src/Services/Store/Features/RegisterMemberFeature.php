<?php
namespace Lifestutor\Services\Store\Features;

use Illuminate\Http\Request;
use Lifestutor\Foundation\AbstractFeature;
use Lifestutor\Domains\Member\Jobs\RegisterMemberJob;
use Lifestutor\Domains\Member\Jobs\ValidateMemberCreationInputJob;
use Lifestutor\Domains\Notification\Jobs\NotifyMemberJob;
use Lifestutor\Domains\Notification\Notifications\MemberCreatedNotification;
use Lifestutor\Domains\Http\Jobs\RespondWithJsonJob;
use Lifestutor\Services\Store\Resources\Views\Transformers\MemberTransformer;

/**
 * Implements the feature of registering a member in the store.
 *
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class RegisterMemberFeature extends AbstractFeature
{
    public function handle(Request $request)
    {
        $input = $request->input();

        $this->run(ValidateMemberCreationInputJob::class, compact('input'));

        $member = $this->run(RegisterMemberJob::class, $request);

        return $this->run(RespondWithJsonJob::class, ['data' => $member, 'transformer' => new MemberTransformer]);

        //$this->runInQueue(NotifyMemberJob::class, ['notification' => new MemberCreatedNotification($member)]);
        
    }
}
