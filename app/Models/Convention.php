<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Team_owner;
use App\Models\GameResult;
use App\Models\Player;


class Convention extends Authenticatable
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'convention_no',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function leagues()
    // {
    //     return $this->hasMany(League::class);
    // }
    public function team_owner()
    {

        return $this->hasOne(Team_owner::class);
    }
    public function players()
    {

        return $this->hasMany(Player::class);
    }
    public function games()
    {

        return $this->hasMany(Game::class);
    }
    public function game_results()
    {

        return $this->hasMany(GameResult::class);
    }
}
