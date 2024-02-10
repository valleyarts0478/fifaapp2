<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Convention;
use App\Models\Team_owner;
use App\Models\Player;
use App\Models\Past;

class PlayerMoveCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:playermove';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '1つ前の大会のプレイヤーを最新の大会にコピーする。';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //最新の大会IDを取得
        $convention = Convention::orderBy('id', 'desc')->first();
        //
        // $conventionId = Past::orderBy('id', 'desc')->first();
        $old_convention = $convention->id - 1;//1個前の大会の分
        $players = Player::where('convention_id', $old_convention)
            ->orderBy('id', 'desc')->get();

        //最新の大会に参加しているチーム情報がとれる
        $team_owners = Team_owner::where('convention_id', $convention->id)->get();

        $copyPlayers = [];
        foreach ($players as $player) {
            //最新の大会に参加済みチームを絞り込んでいる
            $new_team = Team_owner::whereIn('team_name', [$player->team_owner->team_name])
                ->where('convention_id', $convention->id)
                ->get();

            foreach ($new_team as $team) {
                $copyPlayers[] = [
                    'id' => null,
                    'convention_id' => $convention->id,
                    'team_owner_id' =>  $team->id,
                    'position_id' => $player['position_id'],
                    'player_no' => $player['player_no'],
                    'player_name' => $player['player_name'],
                ];
            }
        }

        Player::upsert(
            $copyPlayers,
            ['id'],
            ['id', 'convention_id', 'team_owner_id', 'position_id', 'player_no', 'player_name']
        );

        return 0;
    }
}
