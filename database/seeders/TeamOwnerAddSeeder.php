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
        'id'=> '216',
        'name'=> 'Gresly eFC',
        'email'=> 'grs@rale.net12',
        'password'=> Hash::make('grs187'),
        'convention_id'=> '12',
        'league_id'=> '1',
        'team_name'=> 'Gresly eFC',
        'team_abb'=> 'GRS',
        'twitter_add'=> '@Gresly_eFC',
        'team_logo_url'=> 'GRS.jpg',
        'created_at'=> '2024-02-12 00:00:00'
    ],
    [
        'id'=> '217',
        'name'=> 'Bacchus FC',
        'email'=> 'bac@rale.net12',
        'password'=> Hash::make('bac321'),
        'convention_id'=> '12',
        'league_id'=> '1',
        'team_name'=> 'Bacchus FC',
        'team_abb'=> 'BAC',
        'twitter_add'=> '@Bacchus_FIFA',
        'team_logo_url'=> 'BAC.jpg',
        'created_at'=> '2024-02-12 00:00:00'
    ],
    [
        'id'=> '218',
        'name'=> 'FC Glanz',
        'email'=> 'fcg@rale.net12',
        'password'=> Hash::make('fcg736'),
        'convention_id'=> '12',
        'league_id'=> '1',
        'team_name'=> 'FC Glanz',
        'team_abb'=> 'FCG',
        'twitter_add'=> '@FCGlanz_',
        'team_logo_url'=> 'FCG.png',
        'created_at'=> '2024-02-12 00:00:00'
    ],
    [
        'id'=> '219',
        'name'=> 'ENJOY TOP TEAM',
        'email'=> 'ett@rale.net12',
        'password'=> Hash::make('ett205'),
        'convention_id'=> '12',
        'league_id'=> '2',
        'team_name'=> 'ENJOY TOP TEAM',
        'team_abb'=> 'ETT',
        'twitter_add'=> '@ENJOYTOPTEAM',
        'team_logo_url'=> 'ETT.jpg',
        'created_at'=> '2024-02-12 00:00:00'
    ],
    [
        'id'=> '220',
        'name'=> 'Consonance',
        'email'=> 'con@rale.net12',
        'password'=> Hash::make('con153'),
        'convention_id'=> '12',
        'league_id'=> '2',
        'team_name'=> 'Consonance',
        'team_abb'=> 'CON',
        'twitter_add'=> '@consona55641840',
        'team_logo_url'=> 'CON.jpg',
        'created_at'=> '2024-02-12 00:00:00'
    ],
    [
        'id'=> '221',
        'name'=> 'KFCTT REVOLT',
        'email'=> 'kfc@rale.net12',
        'password'=> Hash::make('kfc611'),
        'convention_id'=> '12',
        'league_id'=> '2',
        'team_name'=> 'KFCTT REVOLT',
        'team_abb'=> 'KFC',
        'twitter_add'=> '@KFCTT_REVOLT',
        'team_logo_url'=> 'KFC.jpg',
        'created_at'=> '2024-02-12 00:00:00'
    ]
           
        ]);
    }
}
