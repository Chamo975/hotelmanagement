<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHalltypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halltypes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sc');
            $table->string('h_description');
            $table->integer('baseoccupancy');
            $table->integer('higheroccupancy');
            //tyenwa
            $table->float('baseprice');
            $table->string('halltypeimg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('halltypes');
    }
}
