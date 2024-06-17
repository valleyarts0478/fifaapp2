<?php

namespace App\Http\Controllers\Team_owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Player;
use App\Models\Position;
use App\Models\Team_owner;
use App\Models\Convention;
use App\Http\Requests\PlayerRequest;
use App\Rules\Player_no_check;
use App\Rules\Player_name_check;
use App\Rules\alpha_num_check;
// use App\Rules\num_only;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use DateTime;


class PlayerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:team_owners');

        $this->middleware(function ($request, $next) {

            $id = $request->route()->parameter('player'); //shopのid取得

            if (!is_null($id)) {
                $playerOwnerId = Player::findOrFail($id)->team_owner->id;
                $playerId = (int)$playerOwnerId; // キャスト 文字列→数値に型変換
                if ($playerId !== Auth::id()) {
                    abort(404);
                }
            }
            return $next($request);
        });
    }

    public function index()
    {

        $teamId = Auth::id();
        $team_owners = Team_owner::where('id', $teamId)->get();

        $players = Player::where('team_owner_id', Auth::id())
            // ->select('id', 'team_owner_id', 'position_id', 'player_no', 'player_name')
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($players);
        $count = Player::where('team_owner_id', Auth::id())->count();


        return view('team_owner.players.index', compact('team_owners', 'players', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $teamId = Auth::id();
        $team_owners = Team_owner::where('id', Auth::id())->get();
        $positions = Position::orderBy('id', 'asc')->get();

        $players = Player::where('team_owner_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($players);
        return view('team_owner.players.create', compact('team_owners', 'players', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //時間指定で登録不可にする
        $date1 = new DateTime('now'); //現在の日時
        $date2 = new DateTime('Sunday 00:00:00'); //登録できる日時
        $date3 = new DateTime('Monday 05:59:59'); //登録不可能な日時
        // dd($date2);
        
        if ($date1->format('Y-m-d H:i:s') >= $date2->format('Y-m-d H:i:s') && $date1->format('Y-m-d H:i:s') <= $date3->format('Y-m-d H:i:s')) {
            // abort(404); // Not Foundページを表示
            return view('team_owner.players.error');
        } else {
            $request->validate([
                'team_owner_id' => 'integer',
                'position_id' => 'integer|max:5',
                'player_no' => ['required', 'integer', 'min:1', 'max:99', new Player_no_check],
                'player_name' => ['required', 'string', 'max:50', new Player_name_check, new alpha_num_check],
                // 'player_name' => ['required', 'unique:players', 'string', 'max:50', new alpha_num_check],

            ]);
            $player = new Player();
            $player->convention_id = $request->convention_id;
            $player->team_owner_id = Auth::id();
            $player->position_id = $request->position_id;
            $player->player_no = $request->player_no;
            $player->player_name = $request->player_name;
            $player->save();
            // dd($player);
            return redirect()
                ->route('team_owner.players.index')
                ->with([
                    'message' => '選手登録をしました。',
                    'status' => 'info'
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teamId = Auth::id();
        $team_owners = Team_owner::where('id', Auth::id())->get();

        $player = Player::findOrFail($id);
        // dd($player->position_id);
        $positions = Position::all();

        // dd($player);
        return view('team_owner.players.edit', compact('team_owners', 'player', 'positions'));
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
        $convention = Convention::orderBy('id', 'desc')->first();

        $player = Player::findOrFail($id);

        $date1 = new DateTime('now'); //現在の日時
        $date2 = new DateTime('Sunday 00:00:00'); //登録できる日時
        $date3 = new DateTime('Monday 05:59:59'); //登録不可能な日時

        // $date1 = new DateTime('now'); //現在の日時
        // $date2 = new DateTime('Saturday 23:59:59'); //登録できる日時
        // $date3 = new DateTime('Sunday 00:00:00 +30 hour'); //登録不可能な日時
        // dd($date3);

        // $date2 =
        if ($date1->format('Y-m-d H:i:s') >= $date2->format('Y-m-d H:i:s') && $date1->format('Y-m-d H:i:s') <= $date3->format('Y-m-d H:i:s')) {
            return view('team_owner.players.error');
        } else {
            $request->validate([
                'team_owner_id' => 'integer|max:255', //255までの数字を許可
                'position_id' => 'integer|max:5', //5までの入力を許可
                'player_no' => [
                    'required',
                    'integer',
                    'min:1',
                    'max:99',
                    Rule::unique('players')->ignore($player->id)
                        ->where(function ($query) {
                            $query->where('team_owner_id', Auth::id());
                        })
                ],
                //     'player_name' => [
                //     'string', 
                //     'max:50', 
                //     new alpha_num_check,
                //     Rule::unique('players', 'player_name')->ignore($player->id)
                //         ->where(function ($query) use ($convention) {
                //         $query->where('convention_id', $convention->id);

                // })],

            ]);

            $player = Player::findOrFail($id);
            // $player->convention_id = $request->convention_id;
            // $player->team_owner_id = $request->team_owner_id;
            $player->position_id = $request->position_id;
            $player->player_no = $request->player_no;
            // $player->player_name = $request->player_name;
            $player->save();

            return redirect()
                ->route('team_owner.players.index')
                ->with([
                    'message' => '選手を更新しました。',
                    'status' => 'info'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Player::findOrFail($id)->delete();

        return redirect()
            ->route('team_owner.players.index')
            ->with([
                'message' => '選手を削除しました。',
                'status' => 'alert'
            ]);
    }
}
