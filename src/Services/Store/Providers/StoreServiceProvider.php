<?php
namespace Lifestutor\Services\Store\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class StoreServiceProvider extends ServiceProvider
{
	/**
	 * Register the Store module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('Lifestutor\Services\Store\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the Store module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('store', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('store', realpath(__DIR__.'/../Resources/Views'));
	}
}
