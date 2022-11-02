<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Player;
use App\Models\Team_owner;
use App\Models\Convention;

class Player_name_check implements Rule
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
        // dd($convention->team_owner->email);
        $team_owner = Team_owner::where('convention_id', $convention->id)->first();
        // dd($team_owner->convention->convention_no);

        $player = Player::where('player_name', $value)
        ->where('convention_id', $convention->id);

       return $player->doesntExist();

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'その選手名はすでに存在しています。';
    }
}
