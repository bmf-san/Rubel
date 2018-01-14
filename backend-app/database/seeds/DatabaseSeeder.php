<?php

use Illuminate\Database\Seeder;
use Database\ForeignKeyManager;

class DatabaseSeeder extends Seeder
{
    /**
     * ForeignKeyManager
     *
     * @var $fkManager
     */
    protected $fkManager;

    /**
     * DatabaseSeeder __constructor
     *
     * @param ForeignKeyManager $fkManager
     */
    public function __construct(ForeignKeyManager $fkManager)
    {
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

        $this->call(AdminsTableSeeder::class);
        $this->call(RelatedPostTablesSeeder::class);
        $this->call(ConfigsTableSeeder::class);

        $this->fkManager->setFKCheckOn();
    }
}
