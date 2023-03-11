<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastPlayerRankTotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('past_player_rank_totals', function (Blueprint $table) {
            $table->id();
            $table->integer('convention_id');
            $table->integer('league_id');
            $table->string('player_name');
            $table->integer('goals');
            $table->integer('assists');
            $table->string('team_name');
            $table->string('team_abb');
            $table->string('team_logo_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('past_player_rank_totals');
    }
}
