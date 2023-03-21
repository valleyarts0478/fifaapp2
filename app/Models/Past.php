<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\ConventionsResult;

class Past extends Model
{
    use HasFactory;

    protected $table = 'pasts';

    protected $fillable = [
        'team_name',
        'home_score',
        'away_score',
        'pk_score',
        'convention_id',
        'league_id',
        'game_point',
        'game_count',
        'win',
        'lose',
        'draw',
        'numbers_diff',
    ];
}
