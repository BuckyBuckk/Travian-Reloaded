<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillageFieldTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('village_field_types', function (Blueprint $table) {
            $table->increments('idVillage');
            $table->string('resField1Type');
            $table->string('resField2Type');
            $table->string('resField3Type');
            $table->string('resField4Type');
            $table->string('resField5Type');
            $table->string('resField6Type');
            $table->string('resField7Type');
            $table->string('resField8Type');
            $table->string('resField9Type');
            $table->string('resField10Type');
            $table->string('resField11Type');
            $table->string('resField12Type');
            $table->string('resField13Type');
            $table->string('resField14Type');
            $table->string('resField15Type');
            $table->string('resField16Type');
            $table->string('resField17Type');
            $table->string('resField18Type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('village_field_types');
    }
}
