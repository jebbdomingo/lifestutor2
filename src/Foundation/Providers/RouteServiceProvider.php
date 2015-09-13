<?php
namespace Lifestutor\Foundation\Providers;

use Caffeinated\Modules\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Name of the service/module
     *
     * @var string
     */
    protected $serviceName = '';

    /**
     * @return void
     */
    public function register()
    {
        // Bind SerializerAbstract to use DataArraySerializer instead, to wrap the record or collection into data object
        $this->app->bind('League\Fractal\Serializer\SerializerAbstract', 'League\Fractal\Serializer\DataArraySerializer');
    }

    /**
     * Define the routes for the module.
     *
     * @param  \Illuminate\Routing\Router $router
     * 
     * @return void
     */
    public function map(Router $router)
    {
        // This namespace is applied to the controller routes in your module's routes file.
        // In addition, it is set as the URL generator's root namespace.
        $namespace = config('modules.namespace') . $this->serviceName . '\Http\Controllers';

        $router->group(['namespace' => $namespace], function($router) {
                $routesFile = config('modules.path') . '/' . $this->serviceName . '/Http/routes.php';
                if (file_exists($routesFile)) {
                    require $routesFile;
                }
            }
        );
    }
}