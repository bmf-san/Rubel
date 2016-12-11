<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\DatabaseManager;

use Carbon\Carbon;

class AdminsTableSeeder extends Seeder
{
    protected $db;

    public function __construct(Illuminate\Database\DatabaseManager $db)
    {
        $this->db = $db;
    }

    public function run()
    {
        $this->db->table('admins')->truncate();

        $this->db->table('admins')->insert([
           'name' => env('ADMIN_NAME', 'admin'),
           'email' => env('ADMIN_EMAIL', 'admin@gmail.com'),
           'password' => bcrypt(env('ADMIN_PASSWORD', 'adminpass')),
           'created_at' => Carbon::now(),
        ]);
    }
}
