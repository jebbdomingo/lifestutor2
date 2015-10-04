<?php
namespace Lifestutor\Services\OAuth2\Providers;

use App;
use Config;
use Lang;
use View;

use Lifestutor\Domains\Http\OAuth2\ScopeStorage;
use Lifestutor\Domains\Http\OAuth2\ClientStorage;
use Lifestutor\Domains\Http\OAuth2\SessionStorage;
use Lifestutor\Domains\Http\OAuth2\AuthCodeStorage;
use Lifestutor\Domains\Http\OAuth2\AccessTokenStorage;
use Lifestutor\Domains\Http\OAuth2\RefreshTokenStorage;
use Illuminate\Support\ServiceProvider;
use League\OAuth2\Server\ResourceServer;
use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Grant\PasswordGrant;
use League\OAuth2\Server\Grant\RefreshTokenGrant;

class OAuth2ServiceProvider extends ServiceProvider
{
	/**
     * Bootstrap any Oauth services
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any Oauth services.
     *
     * @return void
     */
    public function register()
    {
    	// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('Lifestutor\Services\OAuth2\Providers\RouteServiceProvider');

		$this->registerNamespaces();

        $this->authorisation();
        $this->resource();
    }

    /**
	 * Register the Store module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('oauth2', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('oauth2', realpath(__DIR__.'/../Resources/Views'));
	}

    /**
     * Register the Authorisation Server
     *
     * @return void
     */
    private function authorisation()
    {
        $this->app->singleton('League\OAuth2\Server\AuthorizationServer', function ($app) {
            $server = new AuthorizationServer;

            $server->setSessionStorage(new SessionStorage($app->make('db')));
            $server->setAccessTokenStorage(new AccessTokenStorage($app->make('db')));
            $server->setRefreshTokenStorage(new RefreshTokenStorage($app->make('db')));
            $server->setClientStorage(new ClientStorage($app->make('db')));
            $server->setScopeStorage(new ScopeStorage($app->make('db')));
            $server->setAuthCodeStorage(new AuthCodeStorage($app->make('db')));

            $passwordGrant = new PasswordGrant();
            $passwordGrant->setVerifyCredentialsCallback(function ($user, $pass) {
            	return true;
            });
            $server->addGrantType($passwordGrant);

            $refreshTokenGrant = new RefreshTokenGrant;
            $server->addGrantType($refreshTokenGrant);

            $server->setRequest($app['request']);

            return $server;
        });
    }
    
    /**
     * Register the Resource Server
     *
     * @return void
     */
    private function resource()
    {
        $this->app->singleton('League\OAuth2\Server\ResourceServer', function ($app) {
            $server = new ResourceServer(
                new SessionStorage($app->make('db')),
                new AccessTokenStorage($app->make('db')),
                new ClientStorage($app->make('db')),
                new ScopeStorage($app->make('db'))
            );

            $server->setRequest($app['request']);

            return $server;
        });
    }
}
