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
        'id'=> '232',
        'name'=> 'VidaLoca',
        'email'=> 'vlc@rale.net13',
        'password'=> Hash::make("vlc312"),
        'convention_id'=> '13',
        'league_id'=> '2',
        'team_name'=> 'VidaLoca',
        'team_abb'=> 'VLC',
        'twitter_add'=> '@VidaLocaCF',
        'team_logo_url'=> 'VLC.jpg',
        'created_at'=> '2024-07-01 00:00:00'
    ],

        ]);
    }
}
