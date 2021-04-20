<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoupanManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupan_management', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('c_description');
            $table->string('c_img');
            $table->date('cperiod');
            $table->date('ceperiod');
            $table->string('c_code');
            $table->string('c_type');
            $table->decimal('c_value')->default(0.00);
            $table->decimal('min_value')->default(0.00);
            $table->decimal('max_value')->default(0.00);
            $table->integer('cl_user');
            $table->integer('l_coupans');
            $table->boolean('c_status');
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
        Schema::dropIfExists('coupan_management');
    }
}
