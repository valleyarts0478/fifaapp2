<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Team_owner;
use App\Models\Game;
use App\Models\Player;
use App\Models\Convention;
use App\Models\Goal_Assist;
use App\Models\GameResult;


class TeamListController extends Controller
{
    public function index()
    {
        $convention = Convention::orderBy('id', 'desc')->first();

        // dd($convention);
        $team_lists = Team_owner::where('convention_id', $convention->id)->get();

        // foreach ($team_lists as $team_list) {
        //     $league_id[$team_list->team_name] = $team_list->league_id;
        // }
        // dump($league_id);
        // dd($league_id);

        // dd($team_lists);
        return view('user.team_list', compact('team_lists'));
    }

    public function show($id)
    {
        $team = Team_owner::findOrFail($id);
        // dd($team->id);
        $players = Player::where('team_owner_id', $team->id)
            ->orderBy('position_id', 'asc')
            ->get();

        $count = Player::where('team_owner_id', $team->id)->count();

        return view('user.team_detail', compact('team', 'players', 'count'));
    }

    public function schedule($id)
    {
        $team = Team_owner::findOrFail($id);

        //降順の最初のレコードを取得
        $convention = Convention::orderBy('id', 'desc')->first();

        $games = Game::where(function ($query) use ($team) {
            $query->where('home_team', $team->team_name)
                ->orWhere('away_team', $team->team_name);
        })->where(function ($query) use ($convention) {
            $query->where('convention_id', $convention->id);
        })->orderBy('game_date', 'asc')->get();
        // $games = Game::all();

        //チームロゴ取得用
        $game_info = Game::where(function ($query) use ($convention) {
            $query->where('convention_id', $convention->id);
        })->orderBy('game_date', 'asc')->get();

        foreach ($game_info as $info) {
            $team_info['team_name'][] = $info->home_team;
            $team_info['team_name'][] = $info->away_team;
        }
        $team_names = Team_owner::whereIn('team_name', $team_info['team_name'])->get();


        // dd($games);
        return view('user.team_schedule', compact('games', 'team_names'));
    }
    public function schedule_list()
    {
        //降順の最初のレコードを取得
        $convention = Convention::orderBy('id', 'desc')->first();

        $games = Game::where('convention_id', $convention->id)
            ->where('league_id', 1)
            ->orderBy('game_date', 'asc')->get();
        // dd($games);

        $game1_count = count($games);
        $team_list = [];
        // dd($game1_count);
        foreach ($games as $game) {

            $team_list[$game->game_date->format('Y-m-d-H:i')][$game->id] = [
                'home_team' => $game->home_team,
                'away_team' => $game->away_team,

            ];
        }

        //league2
        $game_leagues = Game::where('convention_id', $convention->id)
            ->where('league_id', 2)
            ->orderBy('game_date', 'asc')->get();

        $game2_count = count($game_leagues);

        $team_list_second = [];
        foreach ($game_leagues as $league) {
            $team_list_second[$league->game_date->format('Y-m-d-H:i')][$league->id] = [
                'home_team' => $league->home_team,
                'away_team' => $league->away_team,
            ];
        }

        return view('user.schedule_list', compact('games', 'team_list', 'team_list_second', 'game1_count', 'game2_count'));
    }

    public function day_schedule($date)
    {
        // $team = Team_owner::findOrFail($id);

        //降順の最初のレコードを取得
        $convention = Convention::orderBy('id', 'desc')->first();
        //league1
        $games = Game::where('convention_id', $convention->id)
            ->where('game_date', $date)
            ->where('league_id', 1)
            ->orderBy('game_date', 'asc')->get();

        // dd($games);
        // foreach ($games as $game) {
        //     $team_list[$game->game_date->format('Y-m-d')][$game->id] = [
        //         'home_team' => $game->home_team,
        //         'away_team' => $game->away_team,
        //     ];
        // }

        //league2
        // $games_second = Game::where('convention_id', $convention->id)
        //     ->where('game_date', $date)
        //     ->where('league_id', 2)
        //     ->orderBy('game_date', 'asc')->get();

        // dd($team_list);
        //チームロゴ取得用
        $game_info = Game::where(function ($query) use ($convention) {
            $query->where('convention_id', $convention->id);
        })->orderBy('game_date', 'asc')->get();

        foreach ($game_info as $info) {
            $team_info['team_name'][] = $info->home_team;
            $team_info['team_name'][] = $info->away_team;
        }
        $team_names = Team_owner::whereIn('team_name', $team_info['team_name'])->get();

        //得点・アシスト者表示部分
        //league1
        // $goal_assists = Goal_Assist::find(12);
        // $test = $goal_assists->game_result->game->home_team; //リレーションOK
        // $games = Game::find(8);
        // $test3 = [];
        // foreach ($games as $game) {
        //     $test3 = $game->game_results;
        // }

        // dd($test3);
        // $test = $games->game_results->goal_assists;
        // dd($test);
        // $test2 = [];
        // foreach ($test3 as $player) {
        //     $test2[] = [
        //         'game_result_id' => $player->game_result_id,
        //         'player_name' => $player->player_name,
        //         'goals' => $player->goals,
        //         'assists' => $player->assists,
        //     ];
        // }
        // foreach ($test2 as $value) {
        // }
        // dump($test2);
        // dd($test2);



        // dd($games);
        return view('user.day_schedule', compact('games', 'team_names'));
    }

    public function day_schedule2($date)
    {
        // $team = Team_owner::findOrFail($id);

        //降順の最初のレコードを取得
        $convention = Convention::orderBy('id', 'desc')->first();

        //league2
        $games_second = Game::where('convention_id', $convention->id)
            ->where('game_date', $date)
            ->where('league_id', 2)
            ->orderBy('game_date', 'asc')->get();

        // dd($team_list);
        //チームロゴ取得用
        $game_info = Game::where(function ($query) use ($convention) {
            $query->where('convention_id', $convention->id);
        })->orderBy('game_date', 'asc')->get();

        foreach ($game_info as $info) {
            $team_info['team_name'][] = $info->home_team;
            $team_info['team_name'][] = $info->away_team;
        }
        $team_names = Team_owner::whereIn('team_name', $team_info['team_name'])->get();


        // dd($games);
        return view('user.day_schedule2', compact('team_names', 'games_second'));
    }

    public function day_schedule_show($id)
    {
        //HOME取得用
        $home_game = Game::findOrFail($id);

        $home_owner = Team_owner::where('team_name', $home_game->home_team)->first();

        //リレーション先のカラムを利用する場合の書き方
        //$away_ownerを外からつかうためuseで読み込む
        $home_goal_assists = Goal_Assist::wherehas('team_owner', function ($query) use ($home_owner) {
            $query->where('team_name', $home_owner->team_name);
        })->where('game_result_id', $id)->get();



        //AWAY取得用
        $games = Game::findOrFail($id);

        $away_owner = Team_owner::where('team_name', $games->away_team)->first();

        //リレーション先のカラムを利用する場合の書き方
        //$away_ownerを外からつかうためuseで読み込む
        $away_goal_assists = Goal_Assist::wherehas('team_owner', function ($query) use ($away_owner) {
            $query->where('team_name', $away_owner->team_name);
        })->where('game_result_id', $id)->get();




        return view('user.day_schedule_show', compact('home_game', 'home_owner', 'home_goal_assists', 'games', 'away_owner', 'away_goal_assists'));
    }
}
