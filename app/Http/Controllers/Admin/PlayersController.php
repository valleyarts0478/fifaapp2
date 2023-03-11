<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; //QueryBuilder クエリビルダー
use App\Models\Convention;
use App\Models\Team_owner;
use App\Models\Player;
use App\Models\Position;
use App\Http\Requests\PlayerRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Rules\Player_name_check;
use App\Rules\Admin_Player_no_check;
use App\Rules\alpha_num_check;

class PlayersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

        // $this->middleware(function ($request, $next) {

        //     $id = $request->route()->parameter('player'); //shopのid取得

        //     if (!is_null($id)) {
        //         $playerOwnerId = Player::findOrFail($id)->team_owner->id;
        //         $playerId = (int)$playerOwnerId; // キャスト 文字列→数値に型変換
        //         if ($playerId !== Auth::id()) {
        //             abort(404);
        //         }
        //     }
        //     return $next($request);
        // });
    }

    public function index()
    {
        // $convention = Convention::select('id', 'convention_no')->get();
        // dd($convention->id);
        $team_owners = Team_owner::orderBy('id', 'desc')
            ->get();


        return view('admin.players.index', compact('team_owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $players = Player::select('team_owner_id', 'player_no', 'player_name')
            ->get();

        $team_owners = Team_owner::select('id', 'team_name')->get();
        // dd($team_owners);

        return view('admin.players.create', compact('players', 'team_owners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayerRequest $request)
    {

        $player = new Player();
        $player->team_owner_id = Auth::id();
        $player->player_no = $request->player_no;
        $player->player_name = $request->player_name;
        $player->save();

        return redirect()
            ->route('admin.players.index')
            ->with([
                'message' => '選手登録をしました。',
                'status' => 'info'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team_owner::findOrFail($id);
        // dd($team->id);
        $positions = Position::select('id', 'position_name')->get();
        // dd($team->id);
        $players = Player::where('team_owner_id', $team->id)
            ->orderBy('id', 'asc')
            ->get();

        $count = Player::where('team_owner_id', $team->id)->count();

        return view('admin.players.show', compact('team', 'players', 'positions', 'count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $positions = Position::select('id', 'position_name')->get();
        $players = Player::where('id', $id)
            ->orderBy('id', 'asc')
            ->get();
        // dd($players->team_owner->team_name);

        return view('admin.players.edit', compact('players', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $player = Player::findOrFail($id);
        $team = Team_owner::where('id', $player->team_owner->id)->get();
        // dd($team);
        $request->validate([
            // 'team_owner_id' => 'integer|max:255', //255までの数字を許可
            'position_id' => 'integer|max:5', //5までの入力を許可
            'player_no' => [
                'required',
                'integer',
                'min:1',
                'max:99',
                Rule::unique('players', 'player_no')->ignore($player->team_owner->id),
            ],

            // 'player_name' => [
            //     'required',
            //     'string',
            //     'max:50',
            //     new alpha_num_check,
            //     Rule::unique('players', 'player_name')->ignore($player->id)
            // ],
        ]);
        // $player = Player::findOrFail($id);
        $player->player_name = $request->player_name;
        $player->position_id = $request->position_id;
        $player->player_no = $request->player_no;
        $player->save();

        return redirect()
            ->route('admin.players.index')
            ->with([
                'message' => '選手更新をしました。',
                'status' => 'info'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
