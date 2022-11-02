<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->foreignId('convention_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('team_owner_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            // $table->unsignedBigInteger('position_id');
            $table->foreignId('position_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('player_no')->nullable();
            $table->string('player_name');
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
        // Schema::dropIfExists('positions');
        Schema::dropIfExists('players');
    }
}
