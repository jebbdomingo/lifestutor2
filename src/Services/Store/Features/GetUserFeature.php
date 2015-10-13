<?php
namespace Lifestutor\Services\Store\Features;

use Illuminate\Http\Request;
use Lifestutor\Foundation\AbstractFeature;
use Lifestutor\Domains\User\Jobs\GetUserJob;
use Lifestutor\Domains\Http\Jobs\RespondWithJsonJob;
use Lifestutor\Services\Store\Resources\Views\Transformers\UserTransformer;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Implements the feature of registering a user in the store.
 *
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class GetUserFeature extends AbstractFeature
{
    private $input;

    public function __construct($id)
    {
        $this->input = ['id' => $id];
    }

    public function handle()
    {
        $user = $this->run(GetUserJob::class, $this->input);

        if (is_null($user)) {
            throw new NotFoundHttpException("A user with ID # ({$this->input['id']}) not found", null, 404);
        }

        return $this->run(RespondWithJsonJob::class, ['data' => $user, 'transformer' => new UserTransformer]);
    }
}
