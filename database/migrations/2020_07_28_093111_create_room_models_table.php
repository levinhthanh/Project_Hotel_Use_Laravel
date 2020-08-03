<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->double('price');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('description', 10000);
            $table->boolean('status')->default(true);
            $table->boolean('deleted')->default(false);
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
        Schema::dropIfExists('room_models');
    }
}
