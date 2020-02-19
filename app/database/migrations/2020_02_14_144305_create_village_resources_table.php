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
            $table->integer('currentWood');
            $table->integer('currentClay');
            $table->integer('currentIron');
            $table->integer('currentCrop');
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
