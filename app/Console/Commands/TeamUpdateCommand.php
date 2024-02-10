<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Convention;
use App\Models\Team_owner;
use App\Models\Player;
use App\Models\Past;

class TeamUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:team';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'チームを次の大会にコピーする';

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
        //1つ前の大会・降順の最初のレコードを取得
        // $convention = Past::orderBy('id', 'desc')->first();
        //最新の大会・降順の最初のレコードを取得
        $convention = Convention::orderBy('id', 'desc')->first();
        $old_convention = $convention->id - 1;//1個前の大会の分
        $team_owner = Team_owner::where('convention_id', $old_convention)->get();

        $team_owners = [];
        foreach($team_owner as $result){
            
            $team_owners[] = [
                'id' => null,
                'name' => $result['name'],
                'email' => substr($result['email'], 0, -2). $convention->id,
                // 'email' => $result['email'] . $new_convention->id,
                'email_verified_at' => $result['email_verified_at'],
                'password' => $result['password'],
                'remember_token' => $result['remember_token'],
                'convention_id' => $convention->id,
                'league_id' => $result['league_id'],
                'team_name' => $result['team_name'],
                'team_abb' => $result['team_abb'],
                'twitter_add' => $result['twitter_add'],
                'team_logo_url' => $result['team_logo_url'],
            ];
        }

        Team_owner::upsert(
            $team_owners,
            ['id'],
            ['id', 'name', 'email', 'email_verified_at', 'password', 'remember_token', 'convention_id', 'league_id', 'team_name', 'team_abb', 'twitter_add', 'team_logo_url']
           );

        return 0;
    }
}
