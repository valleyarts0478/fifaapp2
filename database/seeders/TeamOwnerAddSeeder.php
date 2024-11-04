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

    // [
    //     'id'=> '269',
    //     'name'=> 'Analytics',
    //     'email'=> 'ant@rale.net14',
    //     'password'=> Hash::make("ant141"),
    //     'convention_id'=> '14',
    //     'league_id'=> '1',
    //     'team_name'=> 'Analytics',
    //     'team_abb'=> 'ANT',
    //     'twitter_add'=> '@Analytics_fifa_',
    //     'team_logo_url'=> 'ANT.jpg',
    //     'created_at'=> '2024-11-04 00:00:00'
    // ],
    // [
    //     'id'=> '270',
    //     'name'=> 'FC ARDIMENTO',
    //     'email'=> 'fca@rale.net14',
    //     'password'=> Hash::make("fca136"),
    //     'convention_id'=> '14',
    //     'league_id'=> '1',
    //     'team_name'=> 'FC ARDIMENTO',
    //     'team_abb'=> 'FCA',
    //     'twitter_add'=> '@FC_Ardimento',
    //     'team_logo_url'=> 'FCA.jpg',
    //     'created_at'=> '2024-11-04 00:00:00'
    // ],
    // [
    //     'id'=> '271',
    //     'name'=> 'The Konchi FC',
    //     'email'=> 'tkf@rale.net14',
    //     'password'=> Hash::make("tkf110"),
    //     'convention_id'=> '14',
    //     'league_id'=> '2',
    //     'team_name'=> 'The Konchi FC',
    //     'team_abb'=> 'TKF',
    //     'twitter_add'=> '@The_Konchi_FC',
    //     'team_logo_url'=> 'TKF.png',
    //     'created_at'=> '2024-11-04 00:00:00'
    // ],
    // [
    //     'id'=> '272',
    //     'name'=> 'UWAKITI FC',
    //     'email'=> 'uwk@rale.net14',
    //     'password'=> Hash::make("uwk321"),
    //     'convention_id'=> '14',
    //     'league_id'=> '1',
    //     'team_name'=> 'UWAKITI FC',
    //     'team_abb'=> 'UWK',
    //     'twitter_add'=> '@_tubakiti_fifa',
    //     'team_logo_url'=> 'UWK.png',
    //     'created_at'=> '2024-11-04 00:00:00'
    // ],
    [
        'id'=> '273',
        'name'=> 'AC MIKAN',
        'email'=> 'acm@rale.net14',
        'password'=> Hash::make("acm313"),
        'convention_id'=> '14',
        'league_id'=> '1',
        'team_name'=> 'AC MIKAN',
        'team_abb'=> 'ACM',
        'twitter_add'=> '@neoacmikan',
        'team_logo_url'=> 'ACM.png',
        'created_at'=> '2024-11-04 00:00:00'
    ],
    // [
    //     'id'=> '274',
    //     'name'=> 'NANTO',
    //     'email'=> 'nan@rale.net14',
    //     'password'=> Hash::make("nan141"),
    //     'convention_id'=> '14',
    //     'league_id'=> '2',
    //     'team_name'=> 'NANTO',
    //     'team_abb'=> 'NAN',
    //     'twitter_add'=> '@nanto_fc',
    //     'team_logo_url'=> 'NAN.jpg',
    //     'created_at'=> '2024-11-04 00:00:00'
    // ],
    // [
    //     'id'=> '275',
    //     'name'=> 'BREAK TIME',
    //     'email'=> 'brt@rale.net14',
    //     'password'=> Hash::make("brt812"),
    //     'convention_id'=> '14',
    //     'league_id'=> '2',
    //     'team_name'=> 'BREAK TIME',
    //     'team_abb'=> 'BRT',
    //     'twitter_add'=> '@breaktime___',
    //     'team_logo_url'=> 'BRT.jpg',
    //     'created_at'=> '2024-11-04 00:00:00'
    // ],

        ]);
    }
}
