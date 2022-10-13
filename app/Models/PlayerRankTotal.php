<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use App\Models\Goal_Assist;

class PlayerRankTotal extends Model
{
    use HasFactory;

    protected $fillable = [
        'convention_id',
        'league_id',
        'player_name',
        'goals',
        'assists',
        'team_name',
        'team_abb',
        'team_logo_url',
    ];
}
