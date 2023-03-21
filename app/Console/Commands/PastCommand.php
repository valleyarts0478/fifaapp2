<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ConventionsResult;
use App\Models\Past;
use App\Models\Convention;

class PastCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:past';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '試合結果をpastsテーブルへ移動する';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //降順の最初のレコードを取得
        $convention = Convention::orderBy('id', 'desc')->first();
        // $convention1 = Convention::where('id', $convention->id)->first();
        // dd($convention1);
        $results = ConventionsResult::where('convention_id', $convention->id)->get();

        $past = [];
        foreach($results as $result){
            $past[] = [
                'id' => $result['id'],
                'team_name' => $result['team_name'],
                'home_score' => $result['home_score'],
                'away_score' => $result['away_score'],
                'pk_score' => $result['pk_score'],
                'convention_id' => $result['convention_id'],
                'league_id' => $result['league_id'], 
                'game_point' => $result['game_point'], 
                'game_count' => $result['game_count'], 
                'win' => $result['win'], 
                'lose' => $result['lose'], 
                'draw' => $result['draw'], 
                'gain' => $result['gain'], 
                'loss' => $result['loss'], 
                'numbers_diff' => $result['numbers_diff']
            ];

        }
       
            Past::upsert(
             $past,
             ['id'],
             ['id', 'team_name', 'home_score', 'away_score', 'pk_score', 'convention_id', 'league_id', 'game_point', 'game_count', 'win', 'lose', 'draw', 'gain', 'loss', 'numbers_diff']
            );
        
        return 0;
    }
}
