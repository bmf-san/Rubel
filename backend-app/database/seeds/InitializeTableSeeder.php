<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\DatabaseManager;
use Database\ForeignKeyManager;
use Carbon\Carbon;

class InitializeTableSeeder extends Seeder
{
    /**
     * DatabaseManager
     *
     * @var $dbManager
     */
    protected $dbManager;

    /**
     * ForeignKeyManager
     *
     * @var $fkManager
     */
    protected $fkManager;

    /**
     * DatabaseSeeder __constructor
     *
     * @param DatabaseManager $dbManager
     */
    public function __construct(DatabaseManager $dbManager, ForeignKeyManager $fkManager)
    {
        $this->dbManager = $dbManager;
        $this->fkManager = $fkManager;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->fkManager->setFKCheckOff();

        $this->runTruncate();

        $this->runAdmin();
        $this->runRelatedPost();
        $this->runConfig();

        $this->fkManager->setFKCheckOn();
    }

    /**
     * Run truncate methods.
     *
     * @return void
     */
    private function runTruncate(): void
    {
        $this->dbManager->table('admins')->truncate();
        $this->dbManager->table('categories')->truncate();
        $this->dbManager->table('tags')->truncate();
        $this->dbManager->table('comments')->truncate();
        $this->dbManager->table('configs')->truncate();
        $this->dbManager->table('posts')->truncate();
        $this->dbManager->table('tag_post')->truncate();
    }

    /**
     * Run the admin
     */
    private function runAdmin(): void
    {
        $this->dbManager->table('admins')->insert([
           'name' => config('rubel.admin.name'),
           'email' => config('rubel.admin.email'),
           'password' => bcrypt(config('rubel.admin.password')),
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
        ]);
    }

    /**
     * Run the related post
     *
     * @return void
     */
    private function runRelatedPost(): void
    {
        for ($i = 1; $i < 11; ++$i) {
            $this->dbManager->table('categories')->insert([
                'name' => "category-{$i}",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $this->dbManager->table('posts')->insert([
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

            $this->dbManager->table('comments')->insert([
                'post_id' => $i,
                'comment' => "This is {$i} comment.",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $this->dbManager->table('tags')->insert([
                'name' => "tag-{$i}",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $this->dbManager->table('tag_post')->insert([
                'tag_id' => $i,
                'post_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }

    /**
     * Run the config.
     *
     * @return void
     */
    private function runConfig(): void
    {
        $this->dbManager->table('configs')->truncate();

        $configs = [
            'title' => 'Rubel',
            'sub_title' => 'A Simple CMS worked by Laravel, React, and Bulma.',
        ];

        foreach ($configs as $key => $value) {
            $this->dbManager->table('configs')->insert([
                'name' => $key,
                'alias_name' => str_replace("_", " ", mb_ucfirst($key, mb_internal_encoding())),
                'value' => $value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
