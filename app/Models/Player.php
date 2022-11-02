<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Team_owner;
use App\Models\Game;
use App\Models\Position;
use App\Models\Convention;



class Player extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'convention_id',
        'team_owner_id',
        'position_id',
        'player_no',
        'player_name',
    ];

    public function team_owner()
    {

        return $this->belongsTo(Team_owner::class);
    }
    public function convention()
    {

        return $this->belongsTo(Convention::class);
    }
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    // public function game()
    // {
    //     return $this->belongsToMany(Game::class)->withPivot(['goal']);
    // }
}
