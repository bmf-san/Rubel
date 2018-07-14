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
}
