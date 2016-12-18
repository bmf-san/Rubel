<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{
    /**
     * Show a single post
     *
     * @return void
     */
    public function getPosts()
    {
        $this->get('/api/v1/posts')
             ->seeJson([
                 'title'
            ]);
    }

    /**
     * Show posts
     *
     * @return void
     */
    public function getPosts()
    {
        $this->get('/api/v1/posts')
             ->seeJson([
                 'title'
            ]);
    }
}
