<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\GameResult;
use App\Models\Game;
use App\Models\Convention;
use App\Models\ConventionsResult;
use App\Models\League;
use App\Models\Team_owner;
use App\Models\PlayerRankTotal;
use App\Models\PastPlayerRankTotal;
use App\Models\Past;
use Artisan; //追加

class ConventionsResultsController extends Controller
{
    public function index()
    {
        // $goal_assists = Goal_Assist::all();
        //降順の最初のレコードを取得
        $convention = Convention::orderBy('id', 'desc')->first();
        // dd($convention);
        //リレーション先のカラムを利用する場合の書き方
        //$conventionを外からつかうためuseで読み込む
        $convention_results = ConventionsResult::where('convention_id', $convention->id)
            ->orderBy('game_point', 'desc')
            ->orderBy('numbers_diff', 'desc')
            ->get();
        $count = count($convention_results);

        //試合結果が未登録の場合
        if ($count === 0) {
            return view('user.no_match');
        } else
            // dd($convention_results);

            $team_info = [];
        foreach ($convention_results as $result) {
            $team_info['team_name'][] = $result->team_name;
            // 'league_id' => $result->league_id,
        }
        // dd($team_info);
        // 画像情報とるため
        $team_names = Team_owner::where('convention_id', $convention->id)
            ->whereIn('team_name', $team_info['team_name'])->get();
        // $count = count($team_names);
        // dd($cnt, $team_names);
        //flag用
        $test = [];
        foreach ($convention_results as $result) {
            $test[] = [
                'league_id' => $result['league_id']
            ];
        }
        // dump($test);
        // dd($test);
        $flag = array_filter($test, function ($test) {
            return $test['league_id'] == 2;
        });
        // dd($flag);

        return view('user.team_rank', compact('convention_results', 'team_names', 'flag', 'count'));
    }
    public function current()
    {
        $conventionId = Convention::orderBy('id', 'desc')->first();

        //レコードチェック
        $record_check = ConventionsResult::where('convention_id', $conventionId->id)->exists();

        if ($record_check === false) {
            return view('user.no_match');
        } else {

            $convention_results1 = ConventionsResult::where('convention_id', $conventionId->id)
                ->where('league_id', 1)
                ->orderBy('game_point', 'desc')
                ->orderBy('numbers_diff', 'desc')
                ->first();
        }
// dd($convention_results1);
        $team_info1 = [];
        $team_info1['team_name'][] = $convention_results1->team_name;
        // dd($team_info1['team_name']);

        // 画像情報とるため
        $team_names1 = [];
        $team_names1 = Team_owner::where('convention_id', $conventionId->id)
            ->whereIn('team_name', $team_info1['team_name'])->first();
        // dd($team_names1->team_logo_url);


        //Bgroup
        $convention_results2 = ConventionsResult::where('convention_id', $conventionId->id)
            ->where('league_id', 2)
            ->orderBy('game_point', 'desc')
            ->orderBy('numbers_diff', 'desc')
            ->first();
        // dd($convention_results2);
        if ($convention_results2 === null) {
            return view('user.no_match');
        } else {

            $team_info2 = [];
            $team_info2['team_name'][] = $convention_results2->team_name;
            // dd($team_info1['team_name']);

            // 画像情報とるため
            $team_names2 = [];
            $team_names2 = Team_owner::where('convention_id', $conventionId->id)
                ->whereIn('team_name', $team_info2['team_name'])->first();
            // dd($team_names1->team_logo_url);
        }

        //得点王・アシスト王
        //Agroupの得点王を取得
        $player_rank_goal1 = PlayerRankTotal::where('convention_id', $conventionId->id)
            ->where('league_id', '1')
            ->orderBy('goals', 'desc')
            ->first();
        // dd($player_rank_goal1);
        //Bgroupの得点王を取得
        $player_rank_goal2 = PlayerRankTotal::where('convention_id', $conventionId->id)
            ->where('league_id', '2')
            ->orderBy('goals', 'desc')
            ->first();
        //Agroupのアシスト王を取得
        $player_rank_assist1 = PlayerRankTotal::where('convention_id', $conventionId->id)
            ->where('league_id', '1')
            ->orderBy('assists', 'desc')
            ->first();
        //Bgroupのアシスト王を取得
        $player_rank_assist2 = PlayerRankTotal::where('convention_id', $conventionId->id)
            ->where('league_id', '2')
            ->orderBy('assists', 'desc')
            ->first();

        //総合優勝決定戦のスコア
        $sougou_score1 = ($convention_results1->home_score) + ($convention_results1->away_score);
        $sougou_score2 = ($convention_results2->home_score) + ($convention_results2->away_score);
        $pk_score1 = $convention_results1->pk_score;
        $pk_score2 = $convention_results2->pk_score;

        // dd($sougou_score2);
        return view('user.current_competitions', compact(
            'conventionId',
            'team_names1',
            'convention_results1',
            'team_names2',
            'convention_results2',
            'player_rank_goal1',
            'player_rank_goal2',
            'player_rank_assist1',
            'player_rank_assist2',
            'sougou_score1',
            'sougou_score2',
            'pk_score1',
            'pk_score2',

        ));
    }
    public function past()
    {
        $conventionId = Past::orderBy('convention_id', 'desc')->first();

        //レコードチェック
        $record_check = Past::where('convention_id', $conventionId->convention_id)->exists();

        if ($record_check === false) {
            return view('user.no_match');
        } else {

            $convention_results1 = Past::where('convention_id', $conventionId->convention_id)
                ->where('league_id', 1)
                ->orderBy('game_point', 'desc')
                ->orderBy('numbers_diff', 'desc')
                ->first();
        }

        $team_info1 = [];
        $team_info1['team_name'][] = $convention_results1->team_name;
        // dd($team_info1['team_name']);

        // 画像情報とるため
        $team_names1 = [];
        $team_names1 = Team_owner::where('convention_id', $conventionId->convention_id)
            ->whereIn('team_name', $team_info1['team_name'])->first();
        // dd($team_names1->team_logo_url);


        //Bgroup
        $convention_results2 = Past::where('convention_id', $conventionId->convention_id)
            ->where('league_id', 2)
            ->orderBy('game_point', 'desc')
            ->orderBy('numbers_diff', 'desc')
            ->first();
        // dd($convention_results2);
        if ($convention_results2 === null) {
            return view('user.no_match');
        } else {

            $team_info2 = [];
            $team_info2['team_name'][] = $convention_results2->team_name;
            // dd($team_info1['team_name']);

            // 画像情報とるため
            $team_names2 = [];
            $team_names2 = Team_owner::where('convention_id', $conventionId->convention_id)
                ->whereIn('team_name', $team_info2['team_name'])->first();
            // dd($team_names1->team_logo_url);
        }

        //得点王・アシスト王
        //Agroupの得点王を取得
        $player_rank_goal1 = PastPlayerRankTotal::where('convention_id', $conventionId->convention_id)
            ->where('league_id', '1')
            ->orderBy('goals', 'desc')
            ->first();
        // dd($player_rank_goal1);
        //Bgroupの得点王を取得
        $player_rank_goal2 = PastPlayerRankTotal::where('convention_id', $conventionId->convention_id)
            ->where('league_id', '2')
            ->orderBy('goals', 'desc')
            ->first();
        //Agroupのアシスト王を取得
        $player_rank_assist1 = PastPlayerRankTotal::where('convention_id', $conventionId->convention_id)
            ->where('league_id', '1')
            ->orderBy('assists', 'desc')
            ->first();
        //Bgroupのアシスト王を取得
        $player_rank_assist2 = PastPlayerRankTotal::where('convention_id', $conventionId->convention_id)
            ->where('league_id', '2')
            ->orderBy('assists', 'desc')
            ->first();

        //総合優勝決定戦のスコア
        $sougou_score1 = ($convention_results1->home_score) + ($convention_results1->away_score);
        $sougou_score2 = ($convention_results2->home_score) + ($convention_results2->away_score);

        // dd($sougou_score2);
        return view('user.past_competitions', compact(
            'conventionId',
            'team_names1',
            'convention_results1',
            'team_names2',
            'convention_results2',
            'player_rank_goal1',
            'player_rank_goal2',
            'player_rank_assist1',
            'player_rank_assist2',
            'sougou_score1',
            'sougou_score2',

        ));
    }
}
