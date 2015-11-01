<?php
namespace Lifestutor\Services\Store\Features;

use Illuminate\Http\Request;
use Lifestutor\Foundation\AbstractFeature;
use Lifestutor\Domains\User\Jobs\GetUserJob;
use Lifestutor\Domains\Http\Jobs\RespondWithJsonJob;
use Lifestutor\Services\Store\Resources\Views\Transformers\UserTransformer;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Implements the feature of fetching a user from the store.
 *
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class GetUserFeature extends AbstractFeature
{
    /**
     * [$id description]
     *
     * @var [type]
     */
    private $id;

    /**
     * [__construct description]
     *
     * @param integer $id ID of the user
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * [handle description]
     *
     * @return string
     */
    public function handle()
    {
        $user = $this->run(new GetUserJob($this->id));

        if (is_null($user)) {
            throw new NotFoundHttpException("A user with ID # ({$this->input['id']}) not found", null, 404);
        }

        return $this->run(RespondWithJsonJob::class, ['data' => $user, 'transformer' => new UserTransformer]);
    }
}
