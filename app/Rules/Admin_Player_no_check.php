<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Team_owner;
use App\Models\Player;
use App\Models\Convention;

class Admin_Player_no_check implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */

    public function passes($attribute, $value)
    {
        $convention = Convention::orderBy('id', 'desc')->first();
        $post = Player::where('player_no',$value)->get();
        $teamId = Team_owner::where('id', $post->team_owner->id)->first();
dd($teamId);
        $player = Player::where('convention_id', $convention->id)
        ->where('team_owner_id', $teamId)
        ->get();
        // ->where('team_owner_id', $this->team)->get();



        return $player->doesntExist();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
