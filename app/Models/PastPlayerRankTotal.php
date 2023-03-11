<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\PlayerRankTotal;

class PastPlayerRankTotal extends Model
{
    use HasFactory;

    protected $table = 'past_player_rank_totals';

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
