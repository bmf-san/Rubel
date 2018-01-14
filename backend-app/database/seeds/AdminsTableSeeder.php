<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdminsTableSeeder extends Seeder
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
    public function __construct(Illuminate\Database\DatabaseManager $dbManager)
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
        $this->dbManager->table('admins')->truncate();

        $this->dbManager->table('admins')->insert([
           'name' => config('rubel.admin.name'),
           'email' => config('rubel.admin.email'),
           'password' => bcrypt(config('rubel.admin.password')),
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
        ]);
    }
}
