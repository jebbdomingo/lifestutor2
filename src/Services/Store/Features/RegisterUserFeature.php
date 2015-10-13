<?php
namespace Lifestutor\Services\Store\Features;

use Illuminate\Http\Request;
use Lifestutor\Foundation\AbstractFeature;
use Lifestutor\Domains\User\Jobs\RegisterUserJob;
use Lifestutor\Domains\User\Jobs\ValidateUserCreationInputJob;
use Lifestutor\Domains\Notification\Jobs\NotifyUserJob;
use Lifestutor\Domains\Notification\Notifications\UserCreatedNotification;
use Lifestutor\Domains\Http\Jobs\RespondWithJsonJob;
use Lifestutor\Services\Store\Resources\Views\Transformers\UserTransformer;

/**
 * Implements the feature of registering a user in the store.
 *
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class RegisterUserFeature extends AbstractFeature
{
    public function handle(Request $request)
    {
        $input = $request->input();

        $this->run(ValidateUserCreationInputJob::class, compact('input'));

        $user = $this->run(RegisterUserJob::class, $request);

        return $this->run(RespondWithJsonJob::class, ['data' => $user, 'transformer' => new UserTransformer]);

        //$this->runInQueue(NotifyUserJob::class, ['notification' => new UserCreatedNotification($user)]);
        
    }
}
