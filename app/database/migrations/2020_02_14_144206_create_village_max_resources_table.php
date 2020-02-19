<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillageMaxResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('village_max_resources', function (Blueprint $table) {
            $table->increments('idVillage');
            $table->integer('maxWood');
            $table->integer('maxClay');
            $table->integer('maxIron');
            $table->integer('maxCrop');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('village_max_resources');
    }
}
