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

            $table->date('birthday');
            $table->enum('gender', ['Nam','Nữ']);
            $table->string('address',1000);
            $table->string('phone',10);
            $table->enum('possition', ['Tiếp tân', 'Quản lý','Bảo vệ', 'Vệ sinh','IT']);
            $table->string('salary');
            $table->string('image');
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
        Schema::dropIfExists('employees');
    }
}
