<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Convention;
use App\Models\League;
use App\Models\Team;
use App\Models\Team_owner;
use App\Models\Player;
use App\Models\Game;
use App\Models\GameResult;
use App\Models\Goal_Assist;
use App\Models\Position;
use App\Models\Admin;
use App\Models\TeamMember;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            AdminSeeder::class,
            // Ownerseeder::class,
            // Shopseeder::class,
            // ImageSeeder::class,
            // CategorySeeder::class,
            // ProductSeeder::class,
            // StockSeeder::class,
            // UserSeeder::class,
            ConventionSeeder::class,
            LeagueSeeder::class,
            // TeamOwnerSeeder::class,
            // TeamOwnerAddSeeder::class,
            // PositionsSeeder::class,
            // PlayerSeeder::class,
            // TeamMemberSeeder::class,
            // GamesSeeder::class,
            // GameResultSeeder::class,
            // GoalAssistSeeder::class,
        ]);
        // Product::factory(100)->create();
        // Stock::factory(100)->create();
    }
}
