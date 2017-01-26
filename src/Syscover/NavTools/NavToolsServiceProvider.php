<?php namespace Syscover\NavTools;

use Illuminate\Support\ServiceProvider;
use Syscover\NavTools\Lib\Redirector;

class NavToolsServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        // register config files
        $this->publishes([
            __DIR__ . '/../../config/navTools.php' => config_path('navTools.php')
        ]);
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
        // Extend core class Illuminate\Routing\Redirector
	    $this->app->bind('redirect', function($app)
        {
            return new Redirector($app->make(\Illuminate\Routing\UrlGenerator::class));
        });
	}
}