<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            [
                'convention_id' => 2,
                'league_id' => 1,
                'game_date' => '2021/01/01',
                'section' => 1,
                'home_team' => 'team_1',
                'away_team' => 'team_4',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'convention_id' => 2,
                'league_id' => 1,
                'game_date' => '2021/01/02',
                'section' => 1,
                'home_team' => 'team_4',
                'away_team' => 'team_1',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'convention_id' => 2,
                'league_id' => 2,
                'game_date' => '2021/01/03',
                'section' => 2,
                'home_team' => 'team_2',
                'away_team' => 'team_3',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'convention_id' => 2,
                'league_id' => 2,
                'game_date' => '2021/01/03',
                'section' => 2,
                'home_team' => 'team_3',
                'away_team' => 'team_2',
                'created_at' => '2021/01/01 11:11:11',
            ],

        ]);
    }
}
