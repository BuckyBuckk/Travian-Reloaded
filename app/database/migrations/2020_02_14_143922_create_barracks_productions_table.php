<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarracksProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barracks_productions', function (Blueprint $table) {
            $table->integer('idVillage');
            $table->string('troopName');
            $table->integer('troopId');
            $table->integer('troopCount');
            $table->float('troopProdTime');
            $table->integer('timeStarted');
            $table->integer('timeCompleted');
            $table->increments('barrProdId');
            $table->integer('lastUpdate');
            $table->float('troopsDoneAlready');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barracks_productions');
    }
}
