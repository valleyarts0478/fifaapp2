<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ConventionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conventions')->insert([
            [
                'id' => 6,
                'convention_no' => 'RAL-E-6th',
                'created_at' => '2022/01/01 11:11:11'
            ],
            [
                'id' => 7,
                'convention_no' => 'RAL-E-7th',
                'created_at' => '2022/01/01 11:11:11'
            ],
            [
                'id' => 8,
                'convention_no' => 'RAL-E-8th',
                'created_at' => '2022/01/01 11:11:11'
            ],
        ]);
    }
}
