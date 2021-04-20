<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username');
            $table->string('email');
            $table->text('password');
            $table->text('confirmpassword');
            $table->string('edepartment');
            $table->string('edesignation');
            $table->string('country');
            $table->string('reigon');
            $table->string('city');
            $table->string('address');
            $table->string('idtype');
            $table->string('idnumber');
            $table->string('e_img');
            $table->string('remark');
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
        Schema::dropIfExists('employees');
    }
}
