<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Phòng đơn - Hạng sang',
            'image' => 'single_vip.jpg',
            'description' => Str::random(1000),
        ]);

        DB::table('categories')->insert([
            'name' => 'Phòng đơn - Hạng thường',
            'image' => 'single_common.jpg',
            'description' => Str::random(1000),
        ]);

        DB::table('categories')->insert([
            'name' => 'Phòng đôi - Hạng sang',
            'image' => 'double_vip.jpg',
            'description' => Str::random(1000),
        ]);

        DB::table('categories')->insert([
            'name' => 'Phòng đôi - Hạng thường',
            'image' => 'double_common.jpg',
            'description' => Str::random(1000),
        ]);

    }
}
