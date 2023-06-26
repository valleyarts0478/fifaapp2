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
            //     'id' => '41',
            //     'name' => 'FC Mochi Mochi',
            //     'email' => 'fmm9@rale.net',
            //     'password' => Hash::make('fmm1314'),
            //     'convention_id' => '9',
            //     'league_id' => '1',
            //     'team_name' => 'FC Mochi Mochi',
            //     'team_abb' => 'FMM',
            //     'twitter_add' => '@FCMochiMochi1',
            //     'team_logo_url' => 'FMM.png',
            //     'created_at' => '2023-02-17 0:00:00'
            // ],
            // [
            //     'id' => '42',
            //     'name' => 'SC kohaler',
            //     'email' => 'sck9@rale.net',
            //     'password' => Hash::make('sck113'),
            //     'convention_id' => '9',
            //     'league_id' => '1',
            //     'team_name' => 'SC kohaler',
            //     'team_abb' => 'SCK',
            //     'twitter_add' => '@kohaproclub',
            //     'team_logo_url' => 'SCK.png',
            //     'created_at' => '2023-02-17 0:00:00'
            // ],
            // [
            //     'id' => '43',
            //     'name' => 'SC Emslada',
            //     'email' => 'sce9@rale.net',
            //     'password' => Hash::make('sce53'),
            //     'convention_id' => '9',
            //     'league_id' => '1',
            //     'team_name' => 'SC Emslada',
            //     'team_abb' => 'SCE',
            //     'twitter_add' => '@Emslada001',
            //     'team_logo_url' => 'SCE.jpg',
            //     'created_at' => '2023-02-17 0:00:00'
            // ],
            [
                'id' => '85',
                'name' => 'REYSOL FC',
                'email' => 'rey@rale.net10',
                'password' => Hash::make('rey255'),
                'convention_id' => '10',
                'league_id' => '2',
                'team_name' => 'REYSOL FC',
                'team_abb' => 'REY',
                'twitter_add' => '@reysolfc',
                'team_logo_url' => 'REY.png',
                'created_at' => '2023-06-26 0:00:00'
            ],
            [
                'id' => '86',
                'name' => 'FURIN KAZAN',
                'email' => 'fur@rale.net10',
                'password' => Hash::make('fur1821'),
                'convention_id' => '10',
                'league_id' => '1',
                'team_name' => 'FURIN KAZAN',
                'team_abb' => 'FUR',
                'twitter_add' => '@furinkazan_hata',
                'team_logo_url' => 'FUR.png',
                'created_at' => '2023-06-26 0:00:00'
            ],
            [
                'id' => '87',
                'name' => 'THE KONCHI',
                'email' => 'tkf@rale.net10',
                'password' => Hash::make('tkf611'),
                'convention_id' => '10',
                'league_id' => '2',
                'team_name' => 'THE KONCHI',
                'team_abb' => 'TKF',
                'twitter_add' => '@The_Konchi_FC',
                'team_logo_url' => 'TKF.png',
                'created_at' => '2023-06-26 0:00:00'
            ],
            // [
            //     'id' => '47',
            //     'name' => 'Break Time',
            //     'email' => 'brt9@rale.net',
            //     'password' => Hash::make('brt21'),
            //     'convention_id' => '9',
            //     'league_id' => '1',
            //     'team_name' => 'Break Time',
            //     'team_abb' => 'BRT',
            //     'twitter_add' => '@breaktime___',
            //     'team_logo_url' => 'BRT.jpg',
            //     'created_at' => '2023-02-17 0:00:00'
            // ],
            // [
            //     'id' => '48',
            //     'name' => 'EL Brigada',
            //     'email' => 'elb9@rale.net',
            //     'password' => Hash::make('elb213'),
            //     'convention_id' => '9',
            //     'league_id' => '1',
            //     'team_name' => 'EL Brigada',
            //     'team_abb' => 'ELB',
            //     'twitter_add' => '@EL__Brigada',
            //     'team_logo_url' => 'ELB.png',
            //     'created_at' => '2023-02-17 0:00:00'
            // ],
            // [
            //     'id' => '49',
            //     'name' => 'MINOSPACE',
            //     'email' => 'msp9@rale.net',
            //     'password' => Hash::make('msp1619'),
            //     'convention_id' => '9',
            //     'league_id' => '1',
            //     'team_name' => 'MINOSPACE',
            //     'team_abb' => 'MSP',
            //     'twitter_add' => '@minospacejp',
            //     'team_logo_url' => 'MSP.jpg',
            //     'created_at' => '2023-02-17 0:00:00'
            // ],
            // [
            //     'id' => '50',
            //     'name' => 'Marlboro bt',
            //     'email' => 'mar9@rale.net',
            //     'password' => Hash::make('mar181'),
            //     'convention_id' => '9',
            //     'league_id' => '1',
            //     'team_name' => 'Marlboro bt',
            //     'team_abb' => 'MAR',
            //     'twitter_add' => '@BfMarlboro_',
            //     'team_logo_url' => 'MAR.jpg',
            //     'created_at' => '2023-02-17 0:00:00'
            // ],
            // [
            //     'id' => '51',
            //     'name' => 'Nabisco Company',
            //     'email' => 'nbc9@rale.net',
            //     'password' => Hash::make('nbc32'),
            //     'convention_id' => '9',
            //     'league_id' => '1',
            //     'team_name' => 'Nabisco Company',
            //     'team_abb' => 'NBC',
            //     'twitter_add' => '@nabisco_Co',
            //     'team_logo_url' => 'NBC.png',
            //     'created_at' => '2023-02-17 0:00:00'
            // ],
            // [
            //     'id' => '52',
            //     'name' => 'FC HAKODATEJIN',
            //     'email' => 'fch9@rale.net',
            //     'password' => Hash::make('fch84'),
            //     'convention_id' => '9',
            //     'league_id' => '2',
            //     'team_name' => 'FC HAKODATEJIN',
            //     'team_abb' => 'FCH',
            //     'twitter_add' => '@HFifa21',
            //     'team_logo_url' => 'FCH.png',
            //     'created_at' => '2023-02-17 0:00:00'
            // ],
            // [
            //     'id' => '53',
            //     'name' => 'FC ROSE',
            //     'email' => 'rrr9@rale.net',
            //     'password' => Hash::make('rrr1617'),
            //     'convention_id' => '9',
            //     'league_id' => '2',
            //     'team_name' => 'FC ROSE',
            //     'team_abb' => 'RRR',
            //     'twitter_add' => '@FCROSE2022',
            //     'team_logo_url' => 'RRR.jpg',
            //     'created_at' => '2023-02-17 0:00:00'
            // ],
            // [
            //     'id' => '54',
            //     'name' => 'Analytics',
            //     'email' => 'and9@rale.net',
            //     'password' => Hash::make('and414'),
            //     'convention_id' => '9',
            //     'league_id' => '2',
            //     'team_name' => 'Analytics',
            //     'team_abb' => 'AND',
            //     'twitter_add' => '@Analytics_fifa_',
            //     'team_logo_url' => 'AND.jpg',
            //     'created_at' => '2023-02-17 0:00:00'
            // ],
            // [
            //     'id' => '55',
            //     'name' => 'Na Na City',
            //     'email' => 'nnc9@rale.net',
            //     'password' => Hash::make('nnc315'),
            //     'convention_id' => '9',
            //     'league_id' => '2',
            //     'team_name' => 'Na Na City',
            //     'team_abb' => 'NNC',
            //     'twitter_add' => '@FCnanac',
            //     'team_logo_url' => 'NNC.jpg',
            //     'created_at' => '2023-02-17 0:00:00'
            // ],
            // [
            //     'id' => '56',
            //     'name' => 'FC Ardimento',
            //     'email' => 'fca9@rale.net',
            //     'password' => Hash::make('fca14'),
            //     'convention_id' => '9',
            //     'league_id' => '2',
            //     'team_name' => 'FC Ardimento',
            //     'team_abb' => 'FCA',
            //     'twitter_add' => '@FC_Ardimento',
            //     'team_logo_url' => 'FCA.jpg',
            //     'created_at' => '2023-02-17 0:00:00'
            // ],
            // [
            //     'id' => '57',
            //     'name' => 'EL Loco',
            //     'email' => 'ell9@rale.net',
            //     'password' => Hash::make('ell12'),
            //     'convention_id' => '9',
            //     'league_id' => '2',
            //     'team_name' => 'EL Loco',
            //     'team_abb' => 'ELL',
            //     'twitter_add' => '@ellocoefootball',
            //     'team_logo_url' => 'ELL.png',
            //     'created_at' => '2023-02-17 0:00:00'
            // ],
            // [
            //     'id' => '58',
            //     'name' => 'KATANMAIKE FC',
            //     'email' => 'ktm9@rale.net',
            //     'password' => Hash::make('ktm1321'),
            //     'convention_id' => '9',
            //     'league_id' => '2',
            //     'team_name' => 'KATANMAIKE FC',
            //     'team_abb' => 'KTM',
            //     'twitter_add' => '@katanmaike',
            //     'team_logo_url' => 'KTM.jpg',
            //     'created_at' => '2023-02-17 0:00:00'
            // ],
            // [
            //     'id' => '59',
            //     'name' => 'FC EDAmAME',
            //     'email' => 'fed9@rale.net',
            //     'password' => Hash::make('fed45'),
            //     'convention_id' => '9',
            //     'league_id' => '2',
            //     'team_name' => 'FC EDAmAME',
            //     'team_abb' => 'FED',
            //     'twitter_add' => '@fcedamame012',
            //     'team_logo_url' => 'FED.jpg',
            //     'created_at' => '2023-02-17 0:00:00'
            // ],
            // [
            //     'id' => '60',
            //     'name' => 'Ocolle CF',
            //     'email' => 'ocf9@rale.net',
            //     'password' => Hash::make('ocf63'),
            //     'convention_id' => '9',
            //     'league_id' => '2',
            //     'team_name' => 'Ocolle CF',
            //     'team_abb' => 'OCF',
            //     'twitter_add' => '@ocolle_cf',
            //     'team_logo_url' => 'OCF.png',
            //     'created_at' => '2023-02-17 0:00:00'
            // ],
            // [
            //     'id' => '61',
            //     'name' => 'MAJOR',
            //     'email' => 'maj9@rale.net',
            //     'password' => Hash::make('maj1810'),
            //     'convention_id' => '9',
            //     'league_id' => '2',
            //     'team_name' => 'MAJOR',
            //     'team_abb' => 'MAJ',
            //     'twitter_add' => '@MAJOR21381860',
            //     'team_logo_url' => 'MAJ.jpg',
            //     'created_at' => '2023-02-17 0:00:00'
            // ],
            // [
            //     'id' => '62',
            //     'name' => 'FC BossAzul',
            //     'email' => 'fba9@rale.net',
            //     'password' => Hash::make('fba12'),
            //     'convention_id' => '9',
            //     'league_id' => '2',
            //     'team_name' => 'FC BossAzul',
            //     'team_abb' => 'FBA',
            //     'twitter_add' => '@Bossazul11',
            //     'team_logo_url' => 'FBA.jpg',
            //     'created_at' => '2023-02-17 0:00:00'
            // ]
        

        ]);
    }
}
