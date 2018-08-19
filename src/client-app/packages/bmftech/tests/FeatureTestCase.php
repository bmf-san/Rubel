<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Carbon\Carbon;

class FeatureTestCase extends BaseTestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->loadMigrationsFrom(realpath(__DIR__.'/../../../../core-app/database/migrations'));
        $this->artisan('migrate:refresh');
        $this->setData();
        require_once(realpath(__DIR__.'/../../../../core-app/app/Helpers/common.php'));
    }

    /**
     * Override the loadMigrationsFrom method.
     *
     * @param  string $paths
     * @return void
     */
    protected function loadMigrationsFrom($paths)
    {
        $paths = (is_array($paths)) ? $paths : [$paths];
        $this->app->afterResolving('migrator', function ($migrator) use ($paths) {
            foreach ((array) $paths as $path) {
                $migrator->path($path);
            }
        });
    }

    /**
     * To load service provider.
     *
     * @param  Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getPackageProviders($app)
    {
        return ['BmfTech\Providers\AppServiceProvider'];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'mysql_test');
        $app['config']->set('database.connections.mysql_test', [
            'driver'   => 'mysql',
            'host' => 'mysql_test',
            'port' => '3306',
            'database' => 'rubel_test',
            'username' => 'root',
            'password' => 'password',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ]);
        $app['config']->set('rubel.theme.view', 'bmftech');
    }

    /**
     * Set data.
     *
     * @return void
     */
    private function setData()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');

        \DB::table('admins')->insert([
           'name' => 'admin',
           'email' => 'admin@example.com',
           'password' => bcrypt('password'),
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
        ]);

        for ($i = 1; $i < 11; ++$i) {
            \DB::table('categories')->insert([
                'name' => "category-{$i}",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            \DB::table('posts')->insert([
                'admin_id' => 1,
                'category_id' => $i,
                'title' => "Title-{$i}",
                'md_content' => "This is {$i} content.",
                'html_content' => "<h2>This is {$i} content.</h2>",
                'publication_status' => ($i % 2 == 0) ? 'public' : 'private',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'published_at' => Carbon::now()
            ]);

            \DB::table('comments')->insert([
                'post_id' => $i,
                'comment' => "This is {$i} comment.",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            \DB::table('tags')->insert([
                'name' => "tag-{$i}",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            \DB::table('tag_post')->insert([
                'tag_id' => $i,
                'post_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        $configs = [
            'title' => 'Rubel',
            'sub_title' => 'A Simple CMS worked by Laravel, React, and Bulma.',
            'description' => 'Rubel is a friendly CMS for developers.',
        ];

        foreach ($configs as $key => $value) {
            \DB::table('configs')->insert([
                'name' => $key,
                'alias_name' => str_replace("_", " ", mb_ucfirst($key, mb_internal_encoding())),
                'value' => $value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
