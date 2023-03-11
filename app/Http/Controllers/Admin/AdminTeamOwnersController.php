<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\Team_owner;
use App\Models\Player;
use App\Models\Position;
use App\Models\Convention;
use App\Models\League;
use Illuminate\Validation\Rule;
use App\Rules\Admin_Player_no_check;

class AdminTeamOwnersController extends Controller
{
    public function edit($id)
    {
        // return view('admin.team_player.team_player');
        $convention = Convention::orderBy('id', 'desc')->first();
        $positions = Position::select('id', 'position_name')->get();
        $team = Team_owner::findOrFail($id);

        $players = Player::where('team_owner_id', $team->id)
            ->where('convention_id', $convention->id)
            ->orderBy('id', 'asc')
            ->get();

        $count = Player::where('team_owner_id', $team->id)->count();

        return view('admin.team_player.team_player', compact('team', 'players', 'positions', 'count'));
    }
    public function update(Request $request, $id)
    {
        $player = Player::findOrFail($id);
        $team = Team_owner::where('id', $player->team_owner->id)->first();

        $request->validate([
            // 'team_owner_id' => 'integer|max:255', //255までの数字を許可
            'position_id' => 'integer|max:5', //5までの入力を許可
            'player_no' => [
                'required',
                'integer',
                'min:1',
                'max:99',
                // new Admin_Player_no_check,
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
            ->route('admin.team_owners.index')
            ->with([
                'message' => '選手更新をしました。',
                'status' => 'info'
            ]);
    }
    public function destroy($id)
    {
        Player::findOrFail($id)->delete();

        return redirect()
            ->route('admin.team_owners.index')
            ->with([
                'message' => '選手を削除しました。',
                'status' => 'alert'
            ]);
    }
}
