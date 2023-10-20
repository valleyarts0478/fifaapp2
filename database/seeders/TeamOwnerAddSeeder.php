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
                'id' => '108',
                'name' => 'Toflock CF',
                'email' => 'tcf@rale.net11',
                'password' => Hash::make('tcf302'),
                'convention_id' => '11',
                'league_id' => '1',
                'team_name' => 'Toflock CF',
                'team_abb' => 'TCF',
                'twitter_add' => '@ToflockCF',
                'team_logo_url' => 'TCF.png',
                'created_at' => '2023-10-20 0:00:00'
               ],
               [
                'id' => '109',
                'name' => 'Kawatou Factory',
                'email' => 'kwt@rale.net11',
                'password' => Hash::make('kwt3211'),
                'convention_id' => '11',
                'league_id' => '2',
                'team_name' => 'Kawatou Factory',
                'team_abb' => 'KWT',
                'twitter_add' => '@KawatouFactory',
                'team_logo_url' => 'KWT.png',
                'created_at' => '2023-10-20 0:00:00'
               ],
               [
                'id' => '110',
                'name' => 'chupachups1958',
                'email' => 'chu@rale.net11',
                'password' => Hash::make('chu83'),
                'convention_id' => '11',
                'league_id' => '1',
                'team_name' => 'chupachups1958',
                'team_abb' => 'CHU',
                'twitter_add' => '@FCchupachups',
                'team_logo_url' => 'CHU.jpg',
                'created_at' => '2023-10-20 0:00:00'
               ],
               [
                'id' => '111',
                'name' => 'FREESIA',
                'email' => 'fra@rale.net11',
                'password' => Hash::make('fra816'),
                'convention_id' => '11',
                'league_id' => '2',
                'team_name' => 'FREESIA',
                'team_abb' => 'FRA',
                'twitter_add' => '@FREESIAFC',
                'team_logo_url' => 'FRA.jpg',
                'created_at' => '2023-10-20 0:00:00'
               ],
               [
                'id' => '112',
                'name' => 'West Gorton',
                'email' => 'wgn@rale.net11',
                'password' => Hash::make('wgn732'),
                'convention_id' => '11',
                'league_id' => '2',
                'team_name' => 'West Gorton',
                'team_abb' => 'WGN',
                'twitter_add' => '@West_Gorton_FC',
                'team_logo_url' => 'WGN.jpg',
                'created_at' => '2023-10-20 0:00:00'
               ],
               [
                'id' => '113',
                'name' => 'CelesteyBlanco',
                'email' => 'cyb@rale.net11',
                'password' => Hash::make('cyb523'),
                'convention_id' => '11',
                'league_id' => '1',
                'team_name' => 'CelesteyBlanco',
                'team_abb' => 'CyB',
                'twitter_add' => '@CyB_fc24',
                'team_logo_url' => 'CyB.jpg',
                'created_at' => '2023-10-20 0:00:00'
               ],
               [
                'id' => '114',
                'name' => 'El Maverick',
                'email' => 'ema@rale.net11',
                'password' => Hash::make('ema315'),
                'convention_id' => '11',
                'league_id' => '2',
                'team_name' => 'El Maverick',
                'team_abb' => 'EMA',
                'twitter_add' => '@El_Maverick_CF',
                'team_logo_url' => 'EMA.jpg',
                'created_at' => '2023-10-20 0:00:00'
               ]
              

        ]);
    }
}
