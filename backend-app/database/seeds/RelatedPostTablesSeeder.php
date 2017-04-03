<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RelatedPostTablesSeeder extends Seeder
{
    protected $db;

    public function __construct(Illuminate\Database\DatabaseManager $db)
    {
        $this->db = $db;
    }

    public function run()
    {
        $this->db->table('categories')->truncate();
        $this->db->table('posts')->truncate();
        $this->db->table('comments')->truncate();
        $this->db->table('tags')->truncate();
        $this->db->table('tag_post')->truncate();

        $this->db->table('categories')->insert([
            'name' => 'Uncategorized',
            'created_at' => Carbon::now(),
        ]);

        $this->db->table('posts')->insert([
            'admin_id' => 1,
            'category_id' => 1,
            'title' => 'Title-1',
            'content' => 'This is 1 content.',
            'thumb_img_path' => 'http://sns-gazo.co/twitterheader/images/new/twitter-new-header_01994.jpg',
            'publication_date' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);

        $this->db->table('comments')->insert([
            'post_id' => 1,
            'comment' => 'This is 1 comment.',
            'created_at' => Carbon::now(),
        ]);

        $this->db->table('tags')->insert([
            'name' => 'tag-1',
            'created_at' => Carbon::now(),
        ]);

        $this->db->table('tag_post')->insert([
            'tag_id' => 1,
            'post_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        for ($i = 2; $i < 11; ++$i) {
            $this->db->table('categories')->insert([
                'name' => "category-{$i}",
                'created_at' => Carbon::now(),
            ]);

            $this->db->table('posts')->insert([
                'admin_id' => 1,
                'category_id' => $i,
                'title' => "Title-{$i}",
                'content' => "This is {$i} content.",
                'thumb_img_path' => 'http://sns-gazo.co/twitterheader/images/new/twitter-new-header_01994.jpg',
                'publication_date' => Carbon::now(),
                'created_at' => Carbon::now(),
            ]);

            $this->db->table('comments')->insert([
                'post_id' => $i,
                'comment' => "This is {$i} comment.",
                'created_at' => Carbon::now(),
            ]);

            $this->db->table('tags')->insert([
                'name' => "tag-{$i}",
                'created_at' => Carbon::now(),
            ]);

            $this->db->table('tag_post')->insert([
                'tag_id' => $i,
                'post_id' => $i,
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
