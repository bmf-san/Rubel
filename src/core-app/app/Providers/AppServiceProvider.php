<?php

namespace Rubel\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRepositories();
        $this->registerHelpers();
    }

    /**
     * Register repositories
     *
     * @return void
     */
    public function registerRepositories()
    {
        foreach (config('app.repositories') as $key => $value) {
            return $this->app->bind($key, $value);
        }
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
