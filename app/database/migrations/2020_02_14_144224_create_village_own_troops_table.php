<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillageOwnTroopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('village_own_troops', function (Blueprint $table) {
            $table->increments('idVillage');
            $table->float('troop1');
            $table->float('troop2');
            $table->float('troop3');
            $table->float('troop4');
            $table->float('troop5');
            $table->float('troop6');
            $table->float('troop7');
            $table->float('troop8');
            $table->float('troop9');
            $table->float('troop10');
            $table->string('tribe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('village_own_troops');
    }
}
