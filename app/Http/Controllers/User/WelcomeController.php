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
use App\Models\ConventionsResult; //追加
use App\Models\League;
use App\Models\Infomation;
use Carbon\Carbon;
// use App\Models\Past;
use Artisan; //追加

class WelcomeController extends Controller
{
    public function index()
    {
        $infolist = Infomation::orderBy('created_at', 'desc')
            ->paginate(3);

        $convention = Convention::orderBy('id', 'desc')->first();
        //gameのconvention_idを取得するため
        $game_convention_id = Game::orderBy('game_date', 'desc')->first();
        //大会最終日程の日付を取得
        $game_date = Game::where('convention_id', $game_convention_id->convention_id)
            ->orderBy('game_date', 'desc')->first();
        //10時間後
        $last_date = $game_date->game_date->addHour(12);
        //現在の日付・時間を取得
        $today = Carbon::createFromDate();

        // dd($game_date);
        //チーム名を取得
        $team_owners = Team_owner::where('convention_id', $convention->id)->get();

        //チーム順位取得
        // $conventionsResults = ConventionsResult::where('convention_id', $convention->id)->get();

        $true_false = ConventionsResult::where('convention_id', $convention->id)->exists();


        //$conventionsResultsのレコードがあるなら
        if ($true_false === true) {

            //チーム順位取得
            $conventionsResults = ConventionsResult::where('convention_id', $convention->id)->get();

            $team_info = [];
            foreach ($conventionsResults as $result) {
                $team_info['team_name'][] = $result->team_name;
            }

            // 画像情報とるため
            $team_names = Team_owner::where('convention_id', $convention->id)
                ->whereIn('team_name', $team_info['team_name'])
                ->get();

            //$conventionsResultsが空なら
        } else {
            //最新から1を引いたconvention_idを取得
            $conventionsResults = ConventionsResult::where('convention_id', $convention->id - 1)->get();

            $team_info = [];
            foreach ($conventionsResults as $result) {
                $team_info['team_name'][] = $result->team_name;
            }
            // 画像情報とるため
            $team_names = Team_owner::where('convention_id', $convention->id - 1)
                ->whereIn('team_name', $team_info['team_name'])
                ->get();
            //1つ前の大会IDを取得
            $convention = Convention::where('id', $convention->id - 1)->first();
        }
        // dd($convention->convention_no);

        return view('user.welcome', compact('convention', 'infolist', 'conventionsResults', 'team_names', 'last_date', 'today'));
    }
    // public function infolist()
    // {
    //     $infolist = Infomation::select('title', 'post', 'created_at')->orderBy('created_at', 'desc')->paginate(10);
    //     // dd($infolist);
    //     return view('user.infolist', compact('infolist'));
    // }
    public function show($id)
    {
        //infolistを取得
        $info = Infomation::findOrFail($id);

        return view('user.infolist_show', compact('info'));
    }
}
