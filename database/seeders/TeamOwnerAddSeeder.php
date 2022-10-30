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
                'id' => '21',
                'name' => 'Va Ramosun Fc',
                'email' => 'var8@rale.net',
                'password' => Hash::make('var19'),
                'convention_id' => '8',
                'league_id' => '1',
                'team_name' => 'Va Ramosun Fc',
                'team_abb' => 'VAR',
                'twitter_add' => '@FcRamosun',
                'team_logo_url' => 'VAR.png'
            ],
            [
                'id' => '22',
                'name' => 'EL Brigada',
                'email' => 'elb8@rale.net',
                'password' => Hash::make('elb213'),
                'convention_id' => '8',
                'league_id' => '1',
                'team_name' => 'EL Brigada',
                'team_abb' => 'ELB',
                'twitter_add' => '@EL__Brigada',
                'team_logo_url' => 'ELB.png'
            ],
            [
                'id' => '23',
                'name' => 'KATANMAIKE FC',
                'email' => 'ktm8@rale.net',
                'password' => Hash::make('ktm1321'),
                'convention_id' => '8',
                'league_id' => '1',
                'team_name' => 'KATANMAIKE FC',
                'team_abb' => 'KTM',
                'twitter_add' => '@katanmaike',
                'team_logo_url' => 'KTM.jpg'
            ],
            [
                'id' => '24',
                'name' => 'Break Time',
                'email' => 'brt8@rale.net',
                'password' => Hash::make('brt21'),
                'convention_id' => '8',
                'league_id' => '1',
                'team_name' => 'Break Time',
                'team_abb' => 'BRT',
                'twitter_add' => '@breaktime___',
                'team_logo_url' => 'BRT.jpg'
            ],
            [
                'id' => '25',
                'name' => 'FC Ardimento',
                'email' => 'fca8@rale.net',
                'password' => Hash::make('fca14'),
                'convention_id' => '8',
                'league_id' => '1',
                'team_name' => 'FC Ardimento',
                'team_abb' => 'FCA',
                'twitter_add' => '@FC_Ardimento',
                'team_logo_url' => 'FCA.jpg'
            ],
            [
                'id' => '26',
                'name' => 'SC Emslada',
                'email' => 'sce8@rale.net',
                'password' => Hash::make('sce53'),
                'convention_id' => '8',
                'league_id' => '1',
                'team_name' => 'SC Emslada',
                'team_abb' => 'SCE',
                'twitter_add' => '@Emslada001',
                'team_logo_url' => 'SCE.jpg'
            ],
            [
                'id' => '27',
                'name' => 'Analytics',
                'email' => 'and8@rale.net',
                'password' => Hash::make('and414'),
                'convention_id' => '8',
                'league_id' => '1',
                'team_name' => 'Analytics',
                'team_abb' => 'AND',
                'twitter_add' => '@ryo89196330',
                'team_logo_url' => 'AND.jpg'
            ],
            [
                'id' => '28',
                'name' => 'McDonald FC',
                'email' => 'mcd8@rale.net',
                'password' => Hash::make('mcd43'),
                'convention_id' => '8',
                'league_id' => '1',
                'team_name' => 'McDonald FC',
                'team_abb' => 'MCD',
                'twitter_add' => '@takaHer63291213',
                'team_logo_url' => 'MCD.jpg'
            ],
            [
                'id' => '29',
                'name' => 'FC Mochi Mochi',
                'email' => 'fmm8@rale.net',
                'password' => Hash::make('fmm1314'),
                'convention_id' => '8',
                'league_id' => '1',
                'team_name' => 'FC Mochi Mochi',
                'team_abb' => 'FMM',
                'twitter_add' => '@FCMochiMochi1',
                'team_logo_url' => 'FMM.png'
            ],
            [
                'id' => '30',
                'name' => 'SC kohaler',
                'email' => 'sck8@rale.net',
                'password' => Hash::make('sck113'),
                'convention_id' => '8',
                'league_id' => '1',
                'team_name' => 'SC kohaler',
                'team_abb' => 'SCK',
                'twitter_add' => '@mia_mia_39',
                'team_logo_url' => 'SCK.png'
            ],
            [
                'id' => '31',
                'name' => 'FC HAKODATEJIN',
                'email' => 'fch8@rale.net',
                'password' => Hash::make('fch84'),
                'convention_id' => '8',
                'league_id' => '2',
                'team_name' => 'FC HAKODATEJIN',
                'team_abb' => 'FCH',
                'twitter_add' => '@HFifa21',
                'team_logo_url' => 'FCH.jpg'
            ],
            [
                'id' => '32',
                'name' => 'EL Loco',
                'email' => 'ell8@rale.net',
                'password' => Hash::make('ell12'),
                'convention_id' => '8',
                'league_id' => '2',
                'team_name' => 'EL Loco',
                'team_abb' => 'ELL',
                'twitter_add' => '@ellocoefootball',
                'team_logo_url' => 'ELL.png'
            ],
            [
                'id' => '33',
                'name' => 'Na Na City',
                'email' => 'nnc8@rale.net',
                'password' => Hash::make('nnc315'),
                'convention_id' => '8',
                'league_id' => '2',
                'team_name' => 'Na Na City',
                'team_abb' => 'NNC',
                'twitter_add' => '@FCnanac',
                'team_logo_url' => 'NNC.jpg'
            ],
            [
                'id' => '34',
                'name' => 'fc ham seven',
                'email' => 'ham8@rale.net',
                'password' => Hash::make('ham132'),
                'convention_id' => '8',
                'league_id' => '2',
                'team_name' => 'fc ham seven',
                'team_abb' => 'HAM',
                'twitter_add' => '@fifa_hamseven',
                'team_logo_url' => 'HAM.jpg'
            ],
            [
                'id' => '35',
                'name' => 'BIGBANG',
                'email' => 'big8@rale.net',
                'password' => Hash::make('big80'),
                'convention_id' => '8',
                'league_id' => '2',
                'team_name' => 'BIGBANG',
                'team_abb' => 'BIG',
                'twitter_add' => '@BIGBANG_evehide',
                'team_logo_url' => 'BIG.png'
            ],
            [
                'id' => '36',
                'name' => 'FC Japan Powers',
                'email' => 'fjp8@rale.net',
                'password' => Hash::make('fjp1611'),
                'convention_id' => '8',
                'league_id' => '2',
                'team_name' => 'FC Japan Powers',
                'team_abb' => 'FJP',
                'twitter_add' => '@FC Japan Powers',
                'team_logo_url' => 'FJP.png'
            ],
            [
                'id' => '37',
                'name' => 'GOLDEN BROWN FC',
                'email' => 'gbr8@rale.net',
                'password' => Hash::make('gbr182'),
                'convention_id' => '8',
                'league_id' => '2',
                'team_name' => 'GOLDEN BROWN FC',
                'team_abb' => 'GBR',
                'twitter_add' => '@GOLDENBROWNFC',
                'team_logo_url' => 'GBR.jpg'
            ],
            [
                'id' => '38',
                'name' => 'FC Creazione',
                'email' => 'cro8@rale.net',
                'password' => Hash::make('cro1518'),
                'convention_id' => '8',
                'league_id' => '2',
                'team_name' => 'FC Creazione',
                'team_abb' => 'CRO',
                'twitter_add' => '@TKOedeperion',
                'team_logo_url' => 'CRO.jpg'
            ],
            [
                'id' => '39',
                'name' => 'NFC LEOPARD',
                'email' => 'lop8@rale.net',
                'password' => Hash::make('lop1615'),
                'convention_id' => '8',
                'league_id' => '2',
                'team_name' => 'NFC LEOPARD',
                'team_abb' => 'LOP',
                'twitter_add' => '@Bobby_Popovic',
                'team_logo_url' => 'LOP.jpg'
            ],
            [
                'id' => '40',
                'name' => 'FC ROSE',
                'email' => 'rrr8@rale.net',
                'password' => Hash::make('rrr1617'),
                'convention_id' => '8',
                'league_id' => '2',
                'team_name' => 'FC ROSE',
                'team_abb' => 'RRR',
                'twitter_add' => '@TT_FIFA_NO6',
                'team_logo_url' => 'RRR.jpg'
            ]
            
        ]);
    }
}
