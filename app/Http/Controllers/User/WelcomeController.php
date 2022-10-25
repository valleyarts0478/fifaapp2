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
        $conventionsResults = ConventionsResult::where('convention_id', $convention->id)->get();

       $result_id = [];
       foreach($conventionsResults as $result){
        $result_id = $result->convention_id;
       }

       if($result_id === $convention->id){
        $team_info = [];
        foreach($conventionsResults as $result){
            $team_info['team_name'][] = $result->team_name;
        }

        // 画像情報とるため
        $team_names = Team_owner::whereIn('team_name', $team_info['team_name'])->get();
       }else{
        $old_no = $convention->id-1;
        $convention = Convention::where('id', $old_no)->first();

        //最新から1を引いたconvention_idを取得
        $conventionsResults = ConventionsResult::where('convention_id', $old_no)->get();
        
        $team_info = [];
        foreach($conventionsResults as $result){
            $team_info['team_name'][] = $result->team_name;
        }

        // 画像情報とるため
        $team_names = Team_owner::whereIn('team_name', $team_info['team_name'])->get();
        
       }        

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