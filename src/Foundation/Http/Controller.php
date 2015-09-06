<?php
namespace Lifestutor\Foundation\Http;

use Lifestutor\Foundation\ServesFeaturesTrait;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class Controller extends BaseController
{
    use ValidatesRequests;
    use ServesFeaturesTrait;
}