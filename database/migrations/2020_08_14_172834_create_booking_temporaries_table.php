<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTemporariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_temporaries', function (Blueprint $table) {
            $table->id();
            $table->string('checkIn');
            $table->string('checkOut');
            $table->string('id1')->nullable();
            $table->string('id2')->nullable();
            $table->string('id3')->nullable();
            $table->string('id4')->nullable();
            $table->string('id5')->nullable();
            $table->string('id6')->nullable();
            $table->string('id7')->nullable();
            $table->string('id8')->nullable();
            $table->string('id9')->nullable();
            $table->string('id10')->nullable();
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
        Schema::dropIfExists('booking_temporaries');
    }
}
