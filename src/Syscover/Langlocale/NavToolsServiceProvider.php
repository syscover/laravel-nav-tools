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
		// include helpers file
		include __DIR__ . '/Helpers/helpers.php';

        // register config files
        $this->publishes([
            __DIR__ . '/../../config/langlocale.php' => config_path('langlocale.php')
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