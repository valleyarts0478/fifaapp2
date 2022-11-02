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
                'id' => '11',
                'name' => 'BAKEMON',
                'email' => 'bkm@rale.net',
                'password' => Hash::make('bkm1311'),
                'convention_id' => '7',
                'league_id' => '2',
                'team_name' => 'BAKEMON',
                'team_abb' => 'BKM',
                'twitter_add' => '@BAKEMON_ProClub',
                'team_logo_url' => 'BKM.jpg',
                'created_at' => '2022-06-29 0:00:00',
                ],
                [
                'id' => '12',
                'name' => 'FTC MIMOZ',
                'email' => 'fmz@rale.net',
                'password' => Hash::make('fmz26'),
                'convention_id' => '7',
                'league_id' => '2',
                'team_name' => 'FTC MIMOZ',
                'team_abb' => 'FMZ',
                'twitter_add' => '@FcMimoza',
                'team_logo_url' => 'FMZ.jpg',
                'created_at' => '2022-06-29 0:00:00',
                ],

            [
                'id' => '13',
                'name' => 'Na Na City',
                'email' => 'nnc@rale.net',
                'password' => Hash::make('nnc314'),
                'convention_id' => '7',
                'league_id' => '2',
                'team_name' => 'Na Na City',
                'team_abb' => 'NNC',
                'twitter_add' => '@FCnanac',
                'team_logo_url' => 'NNC.jpg',
                'created_at' => '2022-06-29 0:00:00',
                ],
                
                [
                'id' => '14',
                'name' => 'NFL kansen',
                'email' => 'nfl@rale.net',
                'password' => Hash::make('nfl126'),
                'convention_id' => '7',
                'league_id' => '2',
                'team_name' => 'NFL kansen',
                'team_abb' => 'NFL',
                'twitter_add' => '@KansenTeam',
                'team_logo_url' => 'NFL.jpg',
                'created_at' => '2022-06-29 0:00:00',
                ],
                
                [
                'id' => '15',
                'name' => 'HAREM BONUS',
                'email' => 'lvj@rale.net',
                'password' => Hash::make('lvj1022'),
                'convention_id' => '7',
                'league_id' => '2',
                'team_name' => 'HAREM BONUS',
                'team_abb' => 'LVJ',
                'twitter_add' => '@Harem Bonus',
                'team_logo_url' => 'LVJ.jpg',
                'created_at' => '2022-06-29 0:00:00',
                ],
                
                [
                'id' => '16',
                'name' => 'EL Brigada',
                'email' => 'elb@rale.net',
                'password' => Hash::make('elb212'),
                'convention_id' => '7',
                'league_id' => '2',
                'team_name' => 'EL Brigada',
                'team_abb' => 'ELB',
                'twitter_add' => '@EL__Brigada',
                'team_logo_url' => 'ELB.jpg',
                'created_at' => '2022-06-29 0:00:00',
                ],
                
                [
                'id' => '17',
                'name' => 'Waltz SC',
                'email' => 'wlz@rale.net',
                'password' => Hash::make('wlz2612'),
                'convention_id' => '7',
                'league_id' => '2',
                'team_name' => 'Waltz SC',
                'team_abb' => 'WLZ',
                'twitter_add' => '@waltzsc_proclub',
                'team_logo_url' => 'WLZ.jpg',
                'created_at' => '2022-06-29 0:00:00',
                ],
                
                [
                'id' => '18',
                'name' => 'EL Loco',
                'email' => 'ell@rale.net',
                'password' => Hash::make('ell12'),
                'convention_id' => '7',
                'league_id' => '2',
                'team_name' => 'EL Loco',
                'team_abb' => 'ELL',
                'twitter_add' => '@ellocoefootball',
                'team_logo_url' => 'ELL.jpg',
                'created_at' => '2022-06-29 0:00:00',
                ],
                
                [
                'id' => '19',
                'name' => 'alineamento',
                'email' => 'aam@rale.net',
                'password' => Hash::make('aam131'),
                'convention_id' => '7',
                'league_id' => '2',
                'team_name' => 'alineamento',
                'team_abb' => 'AAM',
                'twitter_add' => '@alineamento_pro',
                'team_logo_url' => 'AAM.jpg',
                'created_at' => '2022-06-29 0:00:00',
                ],
                
                [
                'id' => '20',
                'name' => 'FC Japan Powers',
                'email' => 'fjp@rale.net',
                'password' => Hash::make('fjp1610'),
                'convention_id' => '7',
                'league_id' => '2',
                'team_name' => 'FC Japan Powers',
                'team_abb' => 'FJP',
                'twitter_add' => '@FC Japan Powers',
                'team_logo_url' => 'FJP.png',
                'created_at' => '2022-06-29 0:00:00',
                ],                
                
            
        ]);
    }
}
