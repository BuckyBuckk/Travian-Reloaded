<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillageReinforcementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('village_reinforcements', function (Blueprint $table) {
            $table->increments('reinforcementId');
            $table->integer('idvillage');
            $table->integer('idVillageFrom');
            $table->string('tribe');
            $table->integer('troop1');
            $table->integer('troop2');
            $table->integer('troop3');
            $table->integer('troop4');
            $table->integer('troop5');
            $table->integer('troop6');
            $table->integer('troop7');
            $table->integer('troop8');
            $table->integer('troop9');
            $table->integer('troop10');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('village_reinforcements');
    }
}
