<?php

namespace Lifestutor\Services\Store\Http\Controllers;

use Lifestutor\Foundation\Http\Controller;
use Lifestutor\Services\Store\Features\RegisterCitizenFeature;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class CitizenController extends Controller
{
    public function register()
    {
        return $this->serve(RegisterCitizenFeature::class);
    }
}
