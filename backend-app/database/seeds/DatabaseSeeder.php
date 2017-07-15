<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $db;

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
        $this->db->statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(AdminsTableSeeder::class);
        $this->call(RelatedPostTablesSeeder::class);
        $this->call(ConfigsTableSeeder::class);

        $this->db->statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
