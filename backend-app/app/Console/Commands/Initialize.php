<?php

namespace Rubel\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\DatabaseManager;
use Database\ForeignKeyManager;
use Rubel\Models\Admin;
use Rubel\Models\Category;
use Rubel\Models\Comment;
use Rubel\Models\Config;
use Rubel\Models\Post;
use Rubel\Models\Tag;
use Rubel\Models\TagPost;

class Initialize extends Command
{
    /**
     * DatabaseManager
     *
     * @var $db
     */
    protected $db;

    /**
     * ForeignKeyManager
     *
     * @var $fkManager
     */
    protected $fkManager;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize the application';

    /**
     * Create a new command instance.
     *
     * @param DatabaseManager $db
     * @param ForeignKeyManager $fkManager
     * @return void
     */
    public function __construct(DatabaseManager $db, ForeignKeyManager $fkManager)
    {
        parent::__construct();
        $this->db = $db;
        $this->fkManager = $fkManager;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->runTruncate();

        $this->runAdmin();
        $this->runCategory();
        $this->runTag();
        $this->runComment();
        $this->runConfig();
        $this->runDraftPost();
        $this->runPublicPost();
        $this->runTagPost();

        $this->info('Done!');
    }

    /**
     * Run truncate methods
     *
     * @return void
     */
    private function runTruncate()
    {
        $this->fkManager->setFKCheckOff();

        $this->db->table('admins')->truncate();
        $this->db->table('categories')->truncate();
        $this->db->table('tags')->truncate();
        $this->db->table('comments')->truncate();
        $this->db->table('configs')->truncate();
        $this->db->table('posts')->truncate();
        $this->db->table('tag_post')->truncate();

        $this->fkManager->setFKCheckOn();
    }

    /**
     * Run the admin factory
     *
     * @return void
     */
    private function runAdmin()
    {
        $num = (int) $this->ask('How many records do you want to create for the admins table?');
        factory(Admin::class, $num)->create();
    }

    /**
     * Run the category factory
     *
     * @return void
     */
    private function runCategory()
    {
        $num = (int) $this->ask('How many records do you want to create for the categories table?');
        factory(Category::class, $num)->create();
    }

    /**
     * Run the tag factory
     *
     * @return void
     */
    private function runTag()
    {
        $num = (int) $this->ask('How many records do you want to create for the tags table?');
        factory(Tag::class, $num)->create();
    }

    /**
     * Run the comment factory
     *
     * @return void
     */
    private function runComment()
    {
        $num = (int) $this->ask('How many records do you want to create for the comments table?');
        factory(Comment::class, $num)->create();
    }

    /**
     * Run the config factory
     *
     * @return void
     */
    private function runConfig()
    {
        $configs = [
            [
                'name' => 'sub_title',
                'alias_name' => 'SubTitle',
                'value' => 'SubTitle',
            ],
            [
                'name' => 'title',
                'alias_name' => 'Title',
                'value' => 'Title',
            ],
        ];

        foreach ($configs as $config) {
            factory(Config::class)->create($config);
        }
    }

    /**
     * Run the draft post factory
     *
     * @return void
     */
    private function runDraftPost()
    {
        $num = (int) $this->ask('How many records do you want to create for the posts table?');
        factory(Post::class, $num)->create(
            [
                'publication_status' => 'draft',
            ]
        );
    }

    /**
     * Run the public post factory
     *
     * @return void
     */
    private function runPublicPost()
    {
        $num = (int) $this->ask('How many records do you want to create for the posts table?');
        factory(Post::class, $num)->create(
            [
                'publication_status' => 'public',
            ]
        );
    }

    /**
     * Run the tag post factory
     *
     * @return void
     */
    private function runTagPost()
    {
        $num = (int) $this->ask('How many records do you want to create for the tag_post table?');
        factory(TagPost::class, $num)->create();
    }
}
