<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\DatabaseManager;

class DatabaseSeeder extends Seeder
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
    public function __construct(DatabaseManager $db)
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
        $this->setFKCheckOff();

        $this->call(AdminsTableSeeder::class);
        $this->call(RelatedPostTablesSeeder::class);
        $this->call(ConfigsTableSeeder::class);

        $this->setFKCheckOn();
    }

    /**
     * Set foreign key check off
     *
     * @return void
     */
    private function setFKCheckOff()
    {
        switch ($this->db->getDriverName()) {
            case 'mysql':
                $this->db->statement('SET FOREIGN_KEY_CHECKS=0');
                break;
            case 'sqlite':
                $this->db->statement('PRAGMA foreign_keys = OFF');
                break;
        }
    }

    /**
     * Set foreign key check on
     *
     * @return void
     */
    private function setFKCheckOn()
    {
        switch ($this->db->getDriverName()) {
            case 'mysql':
                $this->db->statement('SET FOREIGN_KEY_CHECKS=1');
                break;
            case 'sqlite':
                $this->db->statement('PRAGMA foreign_keys = ON');
                break;
        }
    }
}
