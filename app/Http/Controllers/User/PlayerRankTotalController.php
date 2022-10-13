<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Convention;
use App\Models\PlayerRankTotal;
use App\Models\Player;


class PlayerRankTotalController extends Controller
{
    public function index()
    {
        //降順の最初のレコードを取得
        $convention = Convention::orderBy('id', 'desc')->first();

        $league1_goaltotals = PlayerRankTotal::where('convention_id', $convention->id)
        ->where('league_id', '1')
        ->orderBy('goals', 'desc')
        ->get();

        $league1_assisttotals = PlayerRankTotal::where('convention_id', $convention->id)
        ->where('league_id', '1')
        ->orderBy('assists', 'desc')
        ->get();

        $league2_goaltotals = PlayerRankTotal::where('convention_id', $convention->id)
        ->where('league_id', '2')
        ->orderBy('goals', 'desc')
        ->get();

        $league2_assisttotals = PlayerRankTotal::where('convention_id', $convention->id)
        ->where('league_id', '2')
        ->orderBy('assists', 'desc')
        ->get();


        return view('user.playerranktotal', compact('league1_goaltotals', 'league1_assisttotals', 'league2_goaltotals', 'league2_assisttotals'));
    }
}
