<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillageFieldLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('village_field_levels', function (Blueprint $table) {
            $table->increments('idVillage');
            $table->tinyInteger('resField1Level');
            $table->tinyInteger('resField2Level');
            $table->tinyInteger('resField3Level');
            $table->tinyInteger('resField4Level');
            $table->tinyInteger('resField5Level');
            $table->tinyInteger('resField6Level');
            $table->tinyInteger('resField7Level');
            $table->tinyInteger('resField8Level');
            $table->tinyInteger('resField9Level');
            $table->tinyInteger('resField10Level');
            $table->tinyInteger('resField11Level');
            $table->tinyInteger('resField12Level');
            $table->tinyInteger('resField13Level');
            $table->tinyInteger('resField14Level');
            $table->tinyInteger('resField15Level');
            $table->tinyInteger('resField16Level');
            $table->tinyInteger('resField17Level');
            $table->tinyInteger('resField18Level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('village_field_levels');
    }
}
