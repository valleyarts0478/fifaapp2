<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan; //追加
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\GameResult;
use App\Models\Game;
use App\Models\Player;
use App\Models\Goal_Assist;
use App\Models\Convention;
use App\Models\League;
use App\Models\Team_owner;
use Carbon\Carbon;

class PlayerRankCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'player_rank_total';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ゴール数・アシスト数集計';

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
        // $goal_assists = Goal_Assist::all();
        //降順の最初のレコードを取得
        $convention = Convention::orderBy('id', 'desc')->first();
        //リレーション先のカラムを利用する場合の書き方
        //$conventionを外からつかうためuseで読み込む
        $goal_assists = Goal_Assist::wherehas('game_result', function ($query) use ($convention) {
            $query->where('convention_id', $convention->id);
        })->get();

        if (count($goal_assists) === 0) {
            return view('user.no_match');
        } else {
            $player_name = [];
            foreach ($goal_assists as $name) {
                $player_name['player_name'][] = $name->player_name;
            }

            $p_names = Player::whereIn('player_name', $player_name['player_name'])->get();
        }
        // dd($p_names);
        // foreach ($p_names as $value) {
        // }
        // dump($value->position->position_name);
        // dd($value->position->id);
        // $goal_assist->game_results->convention_id;
        $player_rank = [];
        foreach ($goal_assists as $goal_assist) {

            $player_rank[$goal_assist->player_name][] = [
                'convention_id' => $goal_assist->game_result->convention_id,
                'league_id' => $goal_assist->game_result->league_id,
                'game_result_id' => $goal_assist->game_result_id,
                'team_name' => $goal_assist->team_owner->team_name,
                'team_abb' => $goal_assist->team_owner->team_abb,
                'team_logo_url' => $goal_assist->team_owner->team_logo_url,
                'goals' => $goal_assist->goals,
                'assists' => $goal_assist->assists
            ];
        }

        $goal_ranking = [];
        $assists_ranking = [];
        foreach ($player_rank as $key => $value) {
            $goal_sum = 0;
            $assist_sum = 0;
            foreach ($value as $value2) {
                $goal_sum += $value2['goals'];
                $assist_sum += $value2['assists'];
            }

            $goal_ranking[] = [
                'convention_id' => $value2['convention_id'],
                'league_id' => $value2['league_id'],
                'player_name' => $key,
                'goals' => $goal_sum,
                // 'assists' => $assist_sum,
                'team_name' => $value2['team_name'],
                'team_abb' => $value2['team_abb'],
                'team_logo_url' => $value2['team_logo_url']
            ];
            $assists_ranking[] = [
                'convention_id' => $value2['convention_id'],
                'league_id' => $value2['league_id'],
                'player_name' => $key,
                // 'goals' => $goal_sum,
                'assists' => $assist_sum,
                'team_name' => $value2['team_name'],
                'team_abb' => $value2['team_abb'],
                'team_logo_url' => $value2['team_logo_url']
            ];
        }

        //goalsの降順で並び替え
        array_multisort(array_column($goal_ranking, 'goals'), SORT_DESC, $goal_ranking);
        //assistsの降順で並び替え
        array_multisort(array_column($assists_ranking, 'assists'), SORT_DESC, $assists_ranking);

        //レコード数カウント
        $goal_cnt = count($goal_ranking);
        $assists_cnt = count($assists_ranking);

        // $flag = array_filter($goal_ranking, function ($goal_ranking) {
        //     return $goal_ranking['league_id'] == 2;
        // });

        // dd($flag);
        // dd($goal_ranking);
        return view('user.player_rank', compact('goal_assists', 'p_names', 'goal_ranking', 'assists_ranking', 'goal_cnt', 'assists_cnt'));
        // Goal_Assist::upsert(
        //     $player_rank_total,
        //     ['team_name'],
        //     ['team_name', 'convention_id', 'league_id', 'game_point', 'game_count', 'win', 'lose', 'draw', 'gain', 'loss', 'numbers_diff']
        // );


        return 0;
    }
}
