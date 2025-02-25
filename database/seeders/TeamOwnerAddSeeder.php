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
        'id'=> '296',
        'name'=> 'SEA BREEZE',
        'email'=> 'sea@rale.net15',
        'password'=> Hash::make("sea191"),
        'convention_id'=> '15',
        'league_id'=> '1',
        'team_name'=> 'SEA BREEZE',
        'team_abb'=> 'SEA',
        'twitter_add'=> '@sea_proclub',
        'team_logo_url'=> 'SEA.jpg',
        'created_at'=> '2025-02-25 00:00:00'
    ],
   [
        'id'=> '297',
        'name'=> 'ReVeL EDGE',
        'email'=> 'rvl@rale.net15',
        'password'=> Hash::make("rvl281"),
        'convention_id'=> '15',
        'league_id'=> '2',
        'team_name'=> 'ReVeL EDGE',
        'team_abb'=> 'RVL',
        'twitter_add'=> '@ReVeL_EDGE',
        'team_logo_url'=> 'RVL.jpg',
        'created_at'=> '2025-02-25 00:00:00'
    ],
   [
        'id'=> '298',
        'name'=> 'Joga Bonito FCB',
        'email'=> 'jbf@rale.net15',
        'password'=> Hash::make("jbf201"),
        'convention_id'=> '15',
        'league_id'=> '1',
        'team_name'=> 'Joga Bonito FCB',
        'team_abb'=> 'JBF',
        'twitter_add'=> '@jogabonitofc25',
        'team_logo_url'=> 'JBF.jpg',
        'created_at'=> '2025-02-25 00:00:00'
    ],
     ]);
    }
}
