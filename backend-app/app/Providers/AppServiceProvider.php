<?php

namespace App\Providers;

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
        $this->registerCategoryRepository();
        $this->registerConfigRepository();
        $this->registerPostRepository();
        $this->registerTagRepository();

        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    public function registerConfigRepository()
    {
        return $this->app->bind(\App\Repositories\Contracts\Config\ConfigRepositoryInterface::class, \App\Repositories\Eloquent\Config\CategoryRepository::class);
    }

    public function registerCategoryRepository()
    {
        return $this->app->bind(\App\Repositories\Contracts\Category\CategoryRepositoryInterface::class, \App\Repositories\Eloquent\Category\CategoryRepository::class);
    }
    public function registerPostRepository()
    {
        return $this->app->bind(\App\Repositories\Contracts\Post\PostRepositoryInterface::class, \App\Repositories\Eloquent\Post\PostRepository::class);
    }

    public function registerTagRepository()
    {
        return $this->app->bind(\App\Repositories\Contracts\Tag\TagRepositoryInterface::class, \App\Repositories\Eloquent\Tag\TagRepository::class);
    }
}
