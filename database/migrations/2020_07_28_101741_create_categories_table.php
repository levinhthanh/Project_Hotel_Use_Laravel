<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('price_hour');
            $table->double('price_day');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('description1', 1500);
            $table->string('description2', 1500);
            $table->string('description3', 1500);
            $table->enum('status', ['Hoạt động','Đã xóa'])->default('Hoạt động');
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
        Schema::dropIfExists('categories');
    }
}
