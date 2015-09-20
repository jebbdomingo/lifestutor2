<?php

namespace Lifestutor\Services\Store\Resources\Views\Transformers;

use League\Fractal\TransformerAbstract;
use Lifestutor\Foundation\InvalidInputException;

class ExceptionTransformer extends TransformerAbstract {

    public function transform(\Exception $e)
    {
        $exceptionMessage = [
            'type' => get_class($e),
            'date' => 'September 13, 2015'
        ];

        if ($e instanceof InvalidInputException) {
            $exceptionMessage['message'] = $e->getErrors();
        } else {
            $exceptionMessage['message'] = $e->getMessage();
        }

        return $exceptionMessage;
    }
}
