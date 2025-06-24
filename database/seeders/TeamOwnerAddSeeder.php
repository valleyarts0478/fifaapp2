<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeamOwnerAddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team_owners')->insert([

            [
                'id'=> '318',
                'name'=> 'SwitchTheRipper',
                'email'=> 'str@rale.net16',
                'password'=> Hash::make("str29"),
                'convention_id'=> '16',
                'league_id'=> '2',
                'team_name'=> 'SwitchTheRipper',
                'team_abb'=> 'STR',
                'twitter_add'=> '@switchtheripper',
                'team_logo_url'=> 'STR.png',
                'created_at'=> '2025-06-25 00:00:00'
            ],
        [
                'id'=> '319',
                'name'=> 'Spirit Bomb',
                'email'=> 'spb@rale.net16',
                'password'=> Hash::make("spb619"),
                'convention_id'=> '16',
                'league_id'=> '1',
                'team_name'=> 'Spirit Bomb',
                'team_abb'=> 'SPB',
                'twitter_add'=> '@BombSpirit2025',
                'team_logo_url'=> 'SPB.png',
                'created_at'=> '2025-06-25 00:00:00'
            ],
        [
                'id'=> '320',
                'name'=> 'ALMOND CHOCO',
                'email'=> 'uma@rale.net16',
                'password'=> Hash::make("uma311"),
                'convention_id'=> '16',
                'league_id'=> '1',
                'team_name'=> 'ALMOND CHOCO',
                'team_abb'=> 'UMA',
                'twitter_add'=> '@ALMOND_CHOCO_11',
                'team_logo_url'=> 'UMA.png',
                'created_at'=> '2025-06-25 00:00:00'
            ],
        [
                'id'=> '321',
                'name'=> 'Gimme Shelter',
                'email'=> 'gsr@rale.net16',
                'password'=> Hash::make("gsr917"),
                'convention_id'=> '16',
                'league_id'=> '1',
                'team_name'=> 'Gimme Shelter',
                'team_abb'=> 'GSR',
                'twitter_add'=> '@G_S2025',
                'team_logo_url'=> 'GSR.png',
                'created_at'=> '2025-06-25 00:00:00'
            ],
        [
                'id'=> '322',
                'name'=> 'Another Sky',
                'email'=> 'ans@rale.net16',
                'password'=> Hash::make("ans411"),
                'convention_id'=> '16',
                'league_id'=> '2',
                'team_name'=> 'Another Sky',
                'team_abb'=> 'ANS',
                'twitter_add'=> '@FIFA2056917045',
                'team_logo_url'=> 'ANS.png',
                'created_at'=> '2025-06-25 00:00:00'
            ],
        [
                'id'=> '323',
                'name'=> 'Mokey Turn',
                'email'=> 'mtv@rale.net16',
                'password'=> Hash::make("mtv23"),
                'convention_id'=> '16',
                'league_id'=> '2',
                'team_name'=> 'Mokey Turn',
                'team_abb'=> 'MTV',
                'twitter_add'=> '@monkeyturn_2004',
                'team_logo_url'=> 'MTV.png',
                'created_at'=> '2025-06-25 00:00:00'
            ],
     ]);
    }
}
