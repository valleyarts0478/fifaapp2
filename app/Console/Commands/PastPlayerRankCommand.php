<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\PlayerRankTotal;
use App\Models\PastPlayerRankTotal;
use App\Models\Convention;


class PastPlayerRankCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:pastplayer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '最新の個人スタッツデータを移動する。';

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
        $old_convention = $convention->id - 1;//1個前の大会の分
        // dd($old_convention);
        $player_results = PlayerRankTotal::where('convention_id', $old_convention)->get();

        $past_player = [];
        foreach($player_results as $result){
            $past_player[] = [
                'id' => $result['id'],
                'convention_id' => $result['convention_id'],
                'league_id' => $result['league_id'], 
                'player_name' => $result['player_name'], 
                'goals' => $result['goals'], 
                'assists' => $result['assists'], 
                'team_name' => $result['team_name'], 
                'team_abb' => $result['team_abb'], 
                'team_logo_url' => $result['team_logo_url'], 
            ];

        }

            PastPlayerRankTotal::upsert(
             $past_player,
             ['id'],
             ['id', 'convention_id', 'league_id', 'player_name', 'goals', 'assists', 'team_name', 'team_abb', 'team_logo_url']
            );
        
        return 0;
    }
}
