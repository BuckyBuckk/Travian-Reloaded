<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_villages', function (Blueprint $table) {
            $table->increments('idVillage');
            $table->integer('idPlayer');
            $table->integer('Xcoordinate');
            $table->integer('Ycoordinate');
            $table->string('villageName');
            $table->boolean('capital');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_villages');
    }
}
