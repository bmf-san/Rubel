<?php

namespace Rubel\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\DatabaseManager;
use Database\ForeignKeyManager;
use Rubel\Models\Admin;
use Rubel\Models\Category;
use Rubel\Models\Comment;
use Rubel\Models\Setting;
use Rubel\Models\Post;
use Rubel\Models\Tag;
use Rubel\Models\TagPost;

class Initialize extends Command
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
    protected $description = 'Interactively initialize the application.';

    /**
     * Create a new command instance.
     *
     * @param DatabaseManager $dbManager
     * @param ForeignKeyManager $fkManager
     * @return void
     */
    public function __construct(DatabaseManager $dbManager, ForeignKeyManager $fkManager)
    {
        parent::__construct();
        $this->dbManager = $dbManager;
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

        $this->setUpAdmin();

        $this->runAdmin();
        $this->runCategory();
        $this->runTag();
        $this->runSetting();
        $this->runPost();
        $this->runComment();
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

        $this->dbManager->table('admins')->truncate();
        $this->dbManager->table('categories')->truncate();
        $this->dbManager->table('tags')->truncate();
        $this->dbManager->table('settings')->truncate();
        $this->dbManager->table('posts')->truncate();
        $this->dbManager->table('comments')->truncate();
        $this->dbManager->table('tag_post')->truncate();

        $this->fkManager->setFKCheckOn();
    }

    /**
     * Set up the admin
     *
     * @return void
     */
    private function setUpAdmin()
    {
        if ($this->confirm('Do you want to set up a admin?')) {
            $name = (string) $this->ask('What is the name of a admin?');
            $email = (string) $this->ask('What is the email address of a admin?');
            $password = (string) $this->ask('What is the password of a admin?');
            factory(Admin::class)->create(
                [
                    'name' => $name,
                    'email' => $email,
                    'password' => bcrypt($password),
                ]
            );
        }
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
     * Run the setting factory
     *
     * @return void
     */
    private function runSetting()
    {
        $settings = [
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

        foreach ($settings as $setting) {
            factory(Setting::class)->create($setting);
        }
    }

    /**
     * Run the post factory
     *
     * @return void
     */
    private function runPost()
    {
        $numDraftPost = (int) $this->ask('How many records do you want to create for the draft posts table?');
        $numPublicPost = (int) $this->ask('How many records do you want to create for the public posts table?');

        $sum = (int) ($numDraftPost + $numPublicPost);

        for ($i = 0; $i < $sum; $i++) {
            factory(Post::class)->create(
                [
                    'publication_status' => ($i < $numDraftPost) ? 'draft' : 'public',
                ]
            );
        }
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
