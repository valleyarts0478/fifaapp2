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
        'id'=> '244',
        'name'=> 'ONE STYLE',
        'email'=> 'one@rale.net13',
        'password'=> Hash::make("one514"),
        'convention_id'=> '13',
        'league_id'=> '1',
        'team_name'=> 'ONE STYLE',
        'team_abb'=> 'ONE',
        'twitter_add'=> '@ONE___STYLE',
        'team_logo_url'=> 'ONE.jpg',
        'created_at'=> '2024-07-18 00:00:00'
    ],
    [
        'id'=> '245',
        'name'=> 'SHIMANAMI',
        'email'=> 'shi@rale.net13',
        'password'=> Hash::make("shi98"),
        'convention_id'=> '13',
        'league_id'=> '1',
        'team_name'=> 'SHIMANAMI',
        'team_abb'=> 'SHI',
        'twitter_add'=> '@shimanamifc',
        'team_logo_url'=> 'SHI.jpg',
        'created_at'=> '2024-07-18 00:00:00'
    ],
    [
        'id'=> '246',
        'name'=> 'Frog Chorus',
        'email'=> 'fc@rale.net13',
        'password'=> Hash::make("fc36"),
        'convention_id'=> '13',
        'league_id'=> '1',
        'team_name'=> 'Frog Chorus',
        'team_abb'=> 'FC',
        'twitter_add'=> '@ChorusFrog2024',
        'team_logo_url'=> 'FC.png',
        'created_at'=> '2024-07-18 00:00:00'
    ],
    [
        'id'=> '247',
        'name'=> 'Kamome Madrid',
        'email'=> 'kam@rale.net13',
        'password'=> Hash::make("kam131"),
        'convention_id'=> '13',
        'league_id'=> '2',
        'team_name'=> 'Kamome Madrid',
        'team_abb'=> 'KAM',
        'twitter_add'=> '@kamome_eafc',
        'team_logo_url'=> 'KAM.png',
        'created_at'=> '2024-07-18 00:00:00'
    ],
    [
        'id'=> '248',
        'name'=> 'CANSTI',
        'email'=> 'can@rale.net13',
        'password'=> Hash::make("can141"),
        'convention_id'=> '13',
        'league_id'=> '2',
        'team_name'=> 'CANSTI',
        'team_abb'=> 'CAN',
        'twitter_add'=> '@cansti1224',
        'team_logo_url'=> 'CAN.png',
        'created_at'=> '2024-07-18 00:00:00'
    ],
        ]);
    }
}
