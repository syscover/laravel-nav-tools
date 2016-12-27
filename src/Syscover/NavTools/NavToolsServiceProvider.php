<?php namespace Syscover\NavTools;

use Illuminate\Support\ServiceProvider;

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
        //
	}
}