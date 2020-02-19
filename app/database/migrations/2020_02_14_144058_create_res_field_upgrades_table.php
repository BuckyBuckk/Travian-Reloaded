<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResFieldUpgradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_field_upgrades', function (Blueprint $table) {
            $table->integer('idVillage');
            $table->integer('rfid');
            $table->string('fieldType');
            $table->integer('fieldLevel');
            $table->integer('timeStarted');
            $table->integer('timeCompleted');
            $table->increments('upgradeId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('res_field_upgrades');
    }
}
