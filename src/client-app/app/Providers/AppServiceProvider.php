<?php

namespace Rubel\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Repository array
     *
     * @var array
     */
    private $repositories = [
        '\Rubel\Repositories\Contracts\Setting\SettingRepositoryInterface::class' => '\Rubel\Repositories\Eloquent\Setting\CategoryRepository::class',
        '\Rubel\Repositories\Contracts\Category\CategoryRepositoryInterface::class' => '\Rubel\Repositories\Eloquent\Category\CategoryRepository::class',
        '\Rubel\Repositories\Contracts\Post\PostRepositoryInterface::class' => '\Rubel\Repositories\Eloquent\Post\PostRepository::class',
        '\Rubel\Repositories\Contracts\Tag\TagRepositoryInterface::class' => '\Rubel\Repositories\Eloquent\Tag\TagRepository::class',
    ];

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
        foreach ($this->repositories as $key => $value) {
            return $this->app->bind($key, $value);
        }
    }
}
