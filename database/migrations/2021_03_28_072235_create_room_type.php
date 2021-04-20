<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_type', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->String('short_code')->unique();
            $table->text('description');
            $table->integer('base_occupancy');
            $table->integer('higher_occupancy');
            $table->boolean('extra_bed');
            $table->integer('noofbeds');
            $table->integer('kids_occupancy');
            $table->string('amenities');
            $table->float('base_price');
            $table->float('additional_person_price');
            $table->float('extra_bed_price');
            $table->string('image');
            $table->timestamps();
          



           
        });
      
        
        // Schema::table('room_type', function($table)
        // {
        //     $table->foreign('band_id')
        //         ->references('id')->on('amenities')
        //         ->onDelete('cascade');
        
            
        // });
        
   
    


     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_type');
    }
}
