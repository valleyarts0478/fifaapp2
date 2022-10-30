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

class WelcomeController extends Controller
{
    public function index()
    {
        $infolist = Infomation::orderBy('created_at', 'desc')
            ->paginate(3);

        $convention = Convention::orderBy('id', 'desc')->first();

        //チーム名を取得
        $team_owners = Team_owner::where('convention_id', $convention->id)->get();

        //チーム順位取得
        // $conventionsResults = ConventionsResult::where('convention_id', $convention->id)->get();

        $true_false = ConventionsResult::where('convention_id', $convention->id)->exists();


        //$conventionsResultsのレコードがあるなら
        if($true_false === true){

        //チーム順位取得
        $conventionsResults = ConventionsResult::where('convention_id', $convention->id)->get();

        $team_info = [];
        foreach($conventionsResults as $result){
            $team_info['team_name'][] = $result->team_name;
        }

        // 画像情報とるため
        $team_names = Team_owner::where('convention_id', $convention->id)
        ->whereIn('team_name', $team_info['team_name'])
        ->get();

        //$conventionsResultsが空なら
        }else{
        //最新から1を引いたconvention_idを取得
        $conventionsResults = ConventionsResult::where('convention_id', $convention->id-1)->get();
  
        $team_info = [];
        foreach($conventionsResults as $result){
            $team_info['team_name'][] = $result->team_name;
        }
        // 画像情報とるため
        $team_names = Team_owner::where('convention_id', $convention->id-1)
        ->whereIn('team_name', $team_info['team_name'])
        ->get();
        //1つ前の大会IDを取得
        $convention = Convention::where('id', $convention->id-1)->first();

        }
        // dd($convention->convention_no);

        return view('user.welcome', compact('convention', 'infolist', 'conventionsResults', 'team_names'));
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