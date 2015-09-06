<?php

namespace Lifestutor\Foundation;

use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
trait ServesFeaturesTrait
{
    use DispatchesJobs;

    /**
     * Serve the given feature with the given arguments.
     *
     * @param \Lifestutor\Foundation\AbstractFeature $feature
     * @param array                                  $arguments
     *
     * @return mixed
     */
    public function serve($feature, $arguments = [])
    {
        return $this->dispatchFromArray($feature, $arguments);
    }
}
