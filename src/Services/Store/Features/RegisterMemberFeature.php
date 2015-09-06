<?php
namespace Lifestutor\Services\Store\Features;

use Illuminate\Http\Request;
use Lifestutor\Foundation\AbstractFeature;
use Lifestutor\Domains\Member\Jobs\RegisterMemberJob;
use Lifestutor\Domains\Member\Jobs\ValidateMemberCreationInputJob;
use Lifestutor\Domains\Notification\Jobs\NotifyMemberJob;
use Lifestutor\Domains\Notification\Notifications\MemberCreatedNotification;
use Lifestutor\Domains\Http\Jobs\RespondWithJsonJob;

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

        //$this->runInQueue(NotifyMemberJob::class, ['notification' => new MemberCreatedNotification($member)]);

        return $this->run(RespondWithJsonJob::class, ['content' => $member]);
    }
}
