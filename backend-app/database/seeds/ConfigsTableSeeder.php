<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ConfigsTableSeeder extends Seeder
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
        $this->db->table('configs')->truncate();

        $configs = config('rubel.config');

        foreach ($configs as $key => $value) {
            $this->db->table('configs')->insert([
                'name' => $key,
                'value' => $value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
