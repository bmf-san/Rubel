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
        $this->registerCategoryRepository();
        $this->registerConfigRepository();
        $this->registerPostRepository();
        $this->registerTagRepository();
    }

    public function registerConfigRepository()
    {
        return $this->app->bind(\Rubel\Repositories\Contracts\Config\ConfigRepositoryInterface::class, \Rubel\Repositories\Eloquent\Config\CategoryRepository::class);
    }

    public function registerCategoryRepository()
    {
        return $this->app->bind(\Rubel\Repositories\Contracts\Category\CategoryRepositoryInterface::class, \Rubel\Repositories\Eloquent\Category\CategoryRepository::class);
    }
    public function registerPostRepository()
    {
        return $this->app->bind(\Rubel\Repositories\Contracts\Post\PostRepositoryInterface::class, \Rubel\Repositories\Eloquent\Post\PostRepository::class);
    }

    public function registerTagRepository()
    {
        return $this->app->bind(\Rubel\Repositories\Contracts\Tag\TagRepositoryInterface::class, \Rubel\Repositories\Eloquent\Tag\TagRepository::class);
    }
}
