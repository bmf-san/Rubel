<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\DatabaseManager;
use Carbon\Carbon;

class RelatedPostTablesSeeder extends Seeder
{
    /**
     * DatabaseManager
     *
     * @var $dbManager
     */
    protected $dbManager;

    /**
     * DatabaseSeeder __constructor
     *
     * @param DatabaseManager $dbManager
     */
    public function __construct(DatabaseManager $dbManager)
    {
        $this->dbManager = $dbManager;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->runTruncate();
        $this->runInsert();
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
     * Run insert methods.
     *
     * @return void
     */
    private function runInsert(): void
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
}
