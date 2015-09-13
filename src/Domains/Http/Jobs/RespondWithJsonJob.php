<?php

namespace Lifestutor\Domains\Http\Jobs;

use Illuminate\Routing\ResponseFactory;
use Lifestutor\Foundation\AbstractJob;
use Sorskod\Larasponse\Larasponse;

class RespondWithJsonJob extends AbstractJob
{
    private $data;
    private $transformer;
    private $status;
    private $headers;
    private $options;

    public function __construct($data, $transformer, $status = 200, array $headers = [], $options = 0)
    {
        $this->data        = $data;
        $this->transformer = $transformer;
        $this->status      = $status;
        $this->headers     = $headers;
        $this->options     = $options;
    }

    public function handle(Larasponse $larasponse, ResponseFactory $response)
    {
        $item = $larasponse->item($this->data, $this->transformer);

        return $response->json($item, $this->status, $this->headers, $this->options);
    }
}
