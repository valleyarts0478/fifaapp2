<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConventionResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convention_results', function (Blueprint $table) {
            $table->id();
            $table->string('team_name')->unique()->nullable();
            $table->smallinteger('home_score')->nullable();
            $table->smallinteger('away_score')->nullable();
            $table->smallinteger('pk_score')->nullable();
            $table->foreignId('convention_id')->nullable()->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('league_id')->nullable()->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->smallinteger('game_point')->nullable()->default(0);
            $table->smallinteger('game_count')->nullable()->default(0);
            $table->smallinteger('win')->nullable()->default(0);
            $table->smallinteger('lose')->nullable()->default(0);
            $table->smallinteger('draw')->nullable()->default(0);
            $table->smallinteger('gain')->nullable()->default(0);
            $table->smallinteger('loss')->nullable()->default(0);
            $table->smallinteger('numbers_diff')->nullable()->default(0);
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
        Schema::dropIfExists('convention_results');
    }
}
