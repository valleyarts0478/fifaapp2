<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Infomation;
use App\Models\Team_owner;

class UserInfoController extends Controller
{
    public function index()
    {
        $infolist = Infomation::select('title', 'created_at')
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        //降順の最初のレコードを取得
        $team_owners = Team_owner::all();

        return view('user.welcome', compact('infolist', 'team_owners'));
    }
    public function infolist()
    {
        $infolist = Infomation::select('title', 'post', 'created_at')->orderBy('created_at', 'desc')->paginate(10);
        // dd($infolist);
        return view('user.infolist', compact('infolist'));
    }
    // public function teamlist()
    // {
    //     //降順の最初のレコードを取得
    //     $team_owenrs = Team_owner::all();

    //     return view('user.welcome', compact('team_owners'));
    // }
}
