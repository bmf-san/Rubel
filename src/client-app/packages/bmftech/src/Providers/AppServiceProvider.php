<?php

namespace BmfTech\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->map();
        $this->loadViewsFrom(realpath(__DIR__.'/../../resources/views'), 'bmftech');
        $this->publishes([realpath(__DIR__.'/../../public') => base_path() . '/public/vendor/bmftech'], 'bmftech-public');
        $this->publishes([realpath(__DIR__.'/../../resources/views') => base_path() . '/resources/views/vendor/bmftech'], 'bmftech-views');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerHelpers();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => 'BmfTech\Http\Controllers\Web',
            'as' => 'web.',
            'domain' => config('host.domain')
        ], function ($router) {
            require realpath(__DIR__.'/../../routes/web.php');
        });
    }

    /**
     * Register helpers
     *
     * @return void
     */
    private function registerHelpers()
    {
        foreach (glob(realpath(__DIR__.'/../../src/Helpers').'/*.php') as $filename) {
            require_once($filename);
        }
    }
}
