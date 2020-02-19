<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillageProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('village_productions', function (Blueprint $table) {
            $table->increments('idVillage');
            $table->integer('productionWood');
            $table->integer('productionClay');
            $table->integer('productionIron');
            $table->integer('productionCrop');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('village_productions');
    }
}
