<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leagues')->insert([
            [
                'league_name' => 'Agroup',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'league_name' => 'Bgroup',
                'created_at' => '2021/01/01 11:11:11',
            ],
        ]);
    }
}
