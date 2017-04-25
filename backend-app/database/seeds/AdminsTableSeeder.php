<?php

use Illuminate\Database\Seeder;
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
           'name' => config('rubel.admin.name'),
           'email' => config('rubel.admin.email'),
           'password' => bcrypt(config('rubel.admin.password')),
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
        ]);
    }
}
