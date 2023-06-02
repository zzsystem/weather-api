<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weathers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->string('name');
            $table->float('longitude', 11, 7);
            $table->float('latitude', 11, 7);
            $table->integer('temperature');
            $table->integer('pressure');
            $table->integer('humidity');
            $table->integer('min_temperature');
            $table->integer('max_temperature');
            $table->timestamps();

            $table->foreign('city_id')->on('cities')->references('id');
        });


        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weathers');
    }
};
