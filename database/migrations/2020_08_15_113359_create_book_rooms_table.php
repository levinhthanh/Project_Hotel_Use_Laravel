<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->date('checkIn');
            $table->date('checkOut');
            $table->enum('payment',['money','banking','wallet']);
            $table->string('id_room_list');
            $table->enum('bookStatus', ['Chưa duyệt','Chưa xác nhận','Hoàn tất','Hủy đơn','Đã nhận phòng','Đã trả phòng'])->default('Chưa duyệt');
            $table->string('user_make')->nullable();
            $table->string('user_receive')->nullable();
            $table->string('user_repay')->nullable();
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
        Schema::dropIfExists('book_rooms');
    }
}
