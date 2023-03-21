<?php

namespace App\Http\Controllers\Team_owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\GameResult;
use App\Models\Game;
use App\Models\Convention;
use App\Models\ConventionsResult;
use App\Models\League;
use App\Models\Team_owner;
use App\Models\Player;
use App\Models\Goal_Assist;
use Carbon\Carbon;
use App\Rules\num_only;
use App\Http\Requests\GameResultsRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class GameResultsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:team_owners');

        $this->middleware(function ($request, $next) {

            $id = $request->route()->parameter('result'); //shopのid取得

            if (!is_null($id)) {
                $team_owner = Team_owner::find(Auth::id());

                $game_away_team = GameResult::findOrFail($id)->game->away_team;
                $game_home_team = GameResult::findOrFail($id)->game->home_team;
                // dd($playerOwnerId);

                // dd($game_away_team);
                // $playerId = (int)$playerOwnerId; // キャスト 文字列→数値に型変換
                if ($team_owner->team_name === $game_away_team or $team_owner->team_name === $game_home_team) {
                    //
                } else
                    abort(404);
            }
            return $next($request);
        });
    }

    public function index()
    {
        // $results = GameResult::all();
        $team_owner = Team_owner::find(Auth::id());
        $current_convention = $team_owner->convention_id;
        //降順の最初のレコードを取得
        $convention = Convention::orderBy('id', 'desc')->first();

        $games = Game::where(function ($query) use ($team_owner) {
            $query->where('home_team', $team_owner->team_name)
                ->orWhere('away_team', $team_owner->team_name);
        })->where(function ($query) use ($current_convention) {
            $query->where('convention_id', $current_convention);
        })->orderBy('game_date', 'asc')->get();

        //チームロゴ取得用
        $game_info = Game::where(function ($query) use ($convention) {
            $query->where('convention_id', $convention->id);
        })->orderBy('game_date', 'asc')->get();

        $team_info = [];
        foreach ($game_info as $info) {
            $team_info['team_name'][] = $info->home_team;
            $team_info['team_name'][] = $info->away_team;
        }
        if (is_array($team_info) && empty($team_info)) {
            return view('team_owner.no_match');
        }

        $team_names = Team_owner::where('convention_id', $convention->id)
            ->whereIn('team_name', $team_info['team_name'])->get();

        return view('team_owner.results.index', compact('team_owner', 'games', 'team_names'));
    }

    public function edit($id)
    {
        $team_owner = Team_owner::find(Auth::id());
        $players = Player::where('team_owner_id', $team_owner->id)
            ->orderBy('position_id', 'asc')
            ->get();
        // dd($players);


        $gameResult = GameResult::find($id);
        $goal_assists = Goal_Assist::where('team_owner_id', Auth::id())
            ->where('game_result_id', $gameResult->game_id)
            ->get();

        // プレイヤーごとのゴール、アシスト数をまとめた配列
        $player_team_goals = [];
        foreach ($players as $player) {
            // プレイヤー名をキーとして、配列を初期化
            $player_team_goals[$player->player_name] = [
                "goals" => "",
                "assists" => ""
            ];
        }
        // 全てのプレイヤー名に対する配列ができる
        // dd($player_team_goals);

        foreach ($goal_assists as $goal_assist) {
            // プレイヤー名が合致する$player_team_goalsを上書き
            $player_team_goals[$goal_assist->player_name]["goals"] = $goal_assist->goals ?? "";
            $player_team_goals[$goal_assist->player_name]["assists"] = $goal_assist->assists ?? "";
        }
        // $player_team_goalsが更新される
        // dd($player_team_goals);

        return view('team_owner.results.edit', compact('gameResult', 'team_owner', 'players', 'player_team_goals'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'total_goal' => 'integer|nullable|min:0|max:99',
            'own_goal' => 'integer|nullable|min:1|max:99',
            'goals.*' => ['nullable', 'integer', 'min:1', 'max:99'], //配列の場合の書き方
            'assists.*' => ['nullable', 'integer', 'min:1', 'max:99'], //配列の場合の書き方

        ]);



        $gameResult = GameResult::find($id);
        $team_owner = Team_owner::find(Auth::id());
        $players = $team_owner->players;

        //得点入力
        if ($team_owner->team_name === $gameResult->game->home_team) {
            $gameResult->home_goal = $request->total_goal;
        } elseif ($team_owner->team_name === $gameResult->game->away_team) {
            $gameResult->away_goal = $request->total_goal;
        } else {
            return redirect()
                ->route('team_owner.results.index')
                ->with('status', 'team_nameが統一されていない可能性があります。');
        }

        //オウンゴール入力
        if ($team_owner->team_name === $gameResult->game->home_team) {
            $gameResult->home_own_goal = $request->own_goal;
        } elseif ($team_owner->team_name === $gameResult->game->away_team) {
            $gameResult->away_own_goal = $request->own_goal;
        } else {
            return redirect()
                ->route('team_owner.results.index')
                ->with('status', 'team_nameが統一されていない可能性があります。');
        }
        $gameResult->save();

        //最初にgoalsやassistsに関係するレコードを削除
        $gameResult = GameResult::find($id);
        $goal_assists = Goal_Assist::where('team_owner_id', Auth::id())
            ->where('game_result_id', $gameResult->game_id)
            ->delete();
        //ゴール・アシスト入力
        // $input = $request->all();
        // $goal_assists = Goal_Assist::all();
        $inputs = [];
        //連想配列
        $inputs = [
            // 'player_id' => $request->player_id,
            'goals' => $request->goals,
            'assists' => $request->assists,
        ];

        //$key・・・player_id, goals, assists
        //$player・・・player名
        //$value・・・player名,得点それぞれの配列
        //$score・・・得点やアシスト数
        $goal_assists = [];

        foreach ($inputs as $key => $value) {
            // dump($key, $value);
            if (empty($value)) {
                return '画面を戻り先に選手登録をおこなってください。';
            }
            foreach ($value as $player => $score) {
                // dump($player, $score);
                $goal_assists[$player][$key] = $score;
            }
        }
        // dd($goal_assists);
        $player_goal_assist = [];
        foreach ($goal_assists as $key1 => $value1) {
            // dump($value1['assists']);
            $player_goal_assist = [
                'game_result_id' => $gameResult->game_id,
                'team_owner_id' => $team_owner->id,
                'player_name' => $key1,
                'goals' => $value1['goals'],
                'assists' => $value1['assists'],
            ];

            //goal・assistsの値が両方なければ次へ進む
            if (!$value1['goals'] && !$value1['assists']) {
                continue;
            } else
                Goal_Assist::upsert(
                    $player_goal_assist,
                    ['player_name', 'game_result_id'],
                    ['game_result_id', 'team_owner_id', 'player_name', 'goals', 'assists']
                );
        }

        //合計得点とplayer得点の一致をチェック
        $goal_assist = Goal_Assist::where('game_result_id', $id)
            ->where('team_owner_id', $team_owner->id)
            ->get();

        $goal_total = 0; //個人のトータル得点
        $assist_total = 0;
        foreach ($goal_assist as $data) {
            $goal_total += $data['goals'];
            $assist_total += $data['assists'];
        }

        $result = GameResult::where('id', $id)->get();

        //ログインしているチームがhome_teamと同じ場合
        if ($team_owner->team_name === $gameResult->game->home_team) {
            foreach ($result as $value) {
                $goal_own_total = $goal_total + $value->home_own_goal;
                if ($value->home_goal === NULL) {
                    return back()->withInput()->withErrors([
                        '総得点が入力がされていません。'
                    ]);
                } elseif ($value->home_goal === 3 && $goal_total == NULL) {
                    return redirect()
                        ->route('team_owner.results.index')
                        ->with([
                            'message' => '不戦勝としてHOME側の試合結果を入力しました。',
                            'status' => 'info'
                        ]);
                } elseif ($goal_own_total === $value->home_goal &&  $goal_total >= $assist_total) {
                    return redirect()
                        ->route('team_owner.results.index')
                        ->with([
                            'message' => 'HOME側の試合結果を入力しました。',
                            'status' => 'info'
                        ]);
                } else {
                    return back()->withInput()->withErrors([
                        'GOAL合計が違う。またはアシスト数がGOAL数を上回っています。'
                    ]);
                }
            }
            //ログインしているチームがaway_teamと同じ場合
        } elseif ($team_owner->team_name === $gameResult->game->away_team) {
            foreach ($result as $value) {
                $goal_own_total = $goal_total + $value->away_own_goal;
                if ($value->away_goal === NULL) {
                    return back()->withInput()->withErrors([
                        '総得点が入力がされていません。'
                    ]);
                } elseif ($value->away_goal === 3 && $goal_total == NULL) {
                    return redirect()
                        ->route('team_owner.results.index')
                        ->with([
                            'message' => '不戦勝としてAWAY側の試合結果を入力しました。',
                            'status' => 'info'
                        ]);
                } elseif ($goal_own_total === $value->away_goal &&  $goal_total >= $assist_total) {
                    return redirect()
                        ->route('team_owner.results.index')
                        ->with([
                            'message' => 'AWAY側の試合結果を入力しました。',
                            'status' => 'info'
                        ]);
                } else {
                    return back()->withInput()->withErrors([
                        'GOAL合計が違う。またはアシスト数がGOAL数を上回っています。'
                    ]);
                }
            }
        }
    }
    public function manual()
    {
        return view('team_owner.results.manual');
    }
}
