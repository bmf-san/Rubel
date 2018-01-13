<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ConfigsTableSeeder extends Seeder
{
    /**
     * DatabaseManager
     *
     * @var $db
     */
    protected $db;

    /**
     * DatabaseSeeder __constructor
     *
     * @param DatabaseManager $db
     */
    public function __construct(Illuminate\Database\DatabaseManager $db)
    {
        $this->db = $db;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->db->table('configs')->truncate();

        $configs = [
            'title' => 'Rubel',
            'sub_title' => 'A Simple CMS worked by Laravel, React, and Bulma.',
        ];

        foreach ($configs as $key => $value) {
            $this->db->table('configs')->insert([
                'name' => $key,
                'alias_name' => str_replace("_", " ", mb_ucfirst($key, mb_internal_encoding())),
                'value' => $value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
