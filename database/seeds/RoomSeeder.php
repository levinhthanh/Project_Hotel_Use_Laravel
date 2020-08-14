<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            'name' => 'A101',
            'category_id' => '1',
            'image1' => 'rooms/single_vip.jpg',
            'image2' => 'rooms/single_common.jpg',
            'image3' => 'rooms/single_vip.jpg'
        ]);

        DB::table('rooms')->insert([
            'name' => 'A102',
            'category_id' => '2',
            'image1' => 'rooms/single_vip.jpg',
            'image2' => 'rooms/single_common.jpg',
            'image3' => 'rooms/single_vip.jpg',
            'using' => 'Sẵn sàng'
        ]);

        DB::table('rooms')->insert([
            'name' => 'A103',
            'category_id' => '1',
            'image1' => 'rooms/single_vip.jpg',
            'image2' => 'rooms/single_common.jpg',
            'image3' => 'rooms/single_vip.jpg',
            'using' => 'Đang được đặt',
            'day_in' => '2020-08-20',
            'day_out' => '2020-08-23'
        ]);

        DB::table('rooms')->insert([
            'name' => 'A104',
            'category_id' => '2',
            'image1' => 'rooms/single_vip.jpg',
            'image2' => 'rooms/single_common.jpg',
            'image3' => 'rooms/single_vip.jpg',
            'using' => 'Sẵn sàng'
        ]);

        DB::table('rooms')->insert([
            'name' => 'A105',
            'category_id' => '1',
            'image1' => 'rooms/single_vip.jpg',
            'image2' => 'rooms/single_common.jpg',
            'image3' => 'rooms/single_vip.jpg',
            'using' => 'Đang được đặt',
            'day_in' => '2020-08-21',
            'day_out' => '2020-08-27'
        ]);

        DB::table('rooms')->insert([
            'name' => 'A106',
            'category_id' => '2',
            'image1' => 'rooms/single_vip.jpg',
            'image2' => 'rooms/single_common.jpg',
            'image3' => 'rooms/single_vip.jpg',
            'using' => 'Sẵn sàng'
        ]);

        DB::table('rooms')->insert([
            'name' => 'A107',
            'category_id' => '1',
            'image1' => 'rooms/single_vip.jpg',
            'image2' => 'rooms/single_common.jpg',
            'image3' => 'rooms/single_vip.jpg',
            'using' => 'Đang sử dụng',
            'day_in' => '2020-08-15',
            'day_out' => '2020-08-23'
        ]);

        DB::table('rooms')->insert([
            'name' => 'A108',
            'category_id' => '2',
            'image1' => 'rooms/single_vip.jpg',
            'image2' => 'rooms/single_common.jpg',
            'image3' => 'rooms/single_vip.jpg',
            'using' => 'Sẵn sàng'
        ]);

        DB::table('rooms')->insert([
            'name' => 'A109',
            'category_id' => '1',
            'image1' => 'rooms/single_vip.jpg',
            'image2' => 'rooms/single_common.jpg',
            'image3' => 'rooms/single_vip.jpg',
            'using' => 'Đang sử dụng',
            'day_in' => '2020-08-14',
            'day_out' => '2020-08-23'
        ]);

        DB::table('rooms')->insert([
            'name' => 'A110',
            'category_id' => '2',
            'image1' => 'rooms/single_vip.jpg',
            'image2' => 'rooms/single_common.jpg',
            'image3' => 'rooms/single_vip.jpg',
            'using' => 'Sẵn sàng'
        ]);
    }
}
