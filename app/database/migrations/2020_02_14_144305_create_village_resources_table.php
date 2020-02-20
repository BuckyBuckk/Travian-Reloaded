<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillageResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('village_resources', function (Blueprint $table) {
            $table->increments('idVillage');
            $table->float('currentWood');
            $table->float('currentClay');
            $table->float('currentIron');
            $table->float('currentCrop');
            $table->integer('lastUpdate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('village_resources');
    }
}
