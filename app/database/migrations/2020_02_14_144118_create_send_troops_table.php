<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendTroopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_troops', function (Blueprint $table) {
            $table->increments('sendTroopsId');
            $table->string('sendType');
            $table->integer('idVillageFrom');
            $table->integer('idVillageTo');
            $table->integer('timeSent');
            $table->integer('timeArrived');
            $table->string('troopTribe');
            $table->integer('troop1num');
            $table->integer('troop2num');
            $table->integer('troop3num');
            $table->integer('troop4num');
            $table->integer('troop5num');
            $table->integer('troop6num');
            $table->integer('troop7num');
            $table->integer('troop8num');
            $table->integer('troop9num');
            $table->integer('troop10num');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('send_troops');
    }
}
