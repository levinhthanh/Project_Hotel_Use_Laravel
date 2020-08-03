<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_models')->insert([
            'name' => 'A101',
            'category' => 'Phòng đơn - Hạng sang',
            'price' => 1000000,
            'image1' => '12.jpg',
            'image2' => '24.jpg',
            'image3' => '25.jpg',
            'description' => Str::random(1000),
        ]);

        DB::table('room_models')->insert([
            'name' => 'A102',
            'category' => 'Phòng đơn - Hạng sang',
            'price' => 1000000,
            'image1' => '12.jpg',
            'image2' => '24.jpg',
            'image3' => '25.jpg',
            'description' => Str::random(1000),
        ]);
    }
}
