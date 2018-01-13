<?php

namespace Rubel\Console\Commands;

use Illuminate\Console\Command;
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
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->runAdmin();
        $this->runCategory();
        $this->runTag();
        $this->runComment();
        $this->runDraftPost();
        $this->runPublicPost();
        $this->runTagPost();

        $this->info('Done!');
    }

    /**
     * Run the admin factory
     *
     * @return void
     */
    private function runAdmin()
    {
        $numAdmin = (int) $this->ask('How many records do you want to create for the admins table?');
        factory(Admin::class, $numAdmin)->create();
    }

    /**
     * Run the category factory
     *
     * @return void
     */
    private function runCategory()
    {
        $numCategory = (int) $this->ask('How many records do you want to create for the categories table?');
        factory(Category::class, $numCategory)->create();
    }

    /**
     * Run the tag factory
     *
     * @return void
     */
    private function runTag()
    {
        $numTag = (int) $this->ask('How many records do you want to create for the tags table?');
        factory(Tag::class, $numTag)->create();
    }

    /**
     * Run the comment factory
     *
     * @return void
     */
    private function runComment()
    {
        $numComment = (int) $this->ask('How many records do you want to create for the comments table?');
        factory(Comment::class, $numComment)->create();
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
        $numDraftPost = (int) $this->ask('How many records do you want to create for the posts table?');
        factory(Post::class, $numDraftPost)->create(
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
        $numPrivatePost = (int) $this->ask('How many records do you want to create for the posts table?');
        factory(Post::class, $numPrivatePost)->create(
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
        $numTagPost = (int) $this->ask('How many records do you want to create for the tag_post table?');
        factory(TagPost::class, $numTagPost)->create();
    }
}
