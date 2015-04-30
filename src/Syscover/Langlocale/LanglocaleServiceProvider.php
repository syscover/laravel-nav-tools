<?php namespace Syscover\Langlocale;

use Illuminate\Support\ServiceProvider;

class LanglocaleServiceProvider extends ServiceProvider
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
            realpath(__DIR__ . '/../../config/langlocale.php') => config_path('langlocale.php')
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
