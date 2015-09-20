<?php
namespace Lifestutor\Services\Store\Features;

use Illuminate\Http\Request;
use Lifestutor\Foundation\AbstractFeature;
use Lifestutor\Domains\Member\Jobs\GetMemberJob;
use Lifestutor\Domains\Http\Jobs\RespondWithJsonJob;
use Lifestutor\Services\Store\Resources\Views\Transformers\MemberTransformer;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Implements the feature of registering a member in the store.
 *
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class GetMemberFeature extends AbstractFeature
{
    private $input;

    public function __construct($id)
    {
        $this->input = ['id' => $id];
    }

    public function handle()
    {
        $member = $this->run(GetMemberJob::class, $this->input);

        if (is_null($member)) {
            throw new NotFoundHttpException("A member with ID # ({$this->input['id']}) not found", null, 404);
        }

        return $this->run(RespondWithJsonJob::class, ['data' => $member, 'transformer' => new MemberTransformer]);
    }
}
