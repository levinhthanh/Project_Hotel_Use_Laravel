<?php

use Illuminate\Database\Seeder;
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
            'price_hour' => 100000,
            'price_day' => 2000000,
            'image1' => 'images/categories/single_vip.jpg',
            'image2' => 'images/categories/single_common.jpg',
            'image3' => 'images/categories/single_vip.jpg',
            'description1' => 'College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage',
            'description2' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source',
            'description3' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'
        ]);

        DB::table('categories')->insert([
            'name' => 'Phòng đôi - Hạng sang',
            'price_hour' => 200000,
            'price_day' => 4000000,
            'image1' => 'images/categories/double_vip.jpg',
            'image2' => 'images/categories/single_common.jpg',
            'image3' => 'images/categories/double_vip.jpg',
            'description1' => 'It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia',
            'description2' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source',
            'description3' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'
         ]);

        DB::table('categories')->insert([
            'name' => 'Phòng đơn - Hạng thường',
            'price_hour' => 70000,
            'price_day' => 1400000,
            'image1' => 'images/categories/single_common.jpg',
            'image2' => 'images/categories/single_vip.jpg',
            'image3' => 'images/categories/single_common.jpg',
            'description1' => 'It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,',
            'description2' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source',
            'description3' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'
         ]);

        DB::table('categories')->insert([
            'name' => 'Phòng đôi - Hạng thường',
            'price_hour' => 150000,
            'price_day' => 3000000,
            'image1' => 'images/categories/double_common.jpg',
            'image2' => 'images/categories/double_vip.jpg',
            'image3' => 'images/categories/single_common.jpg',
            'description1' => 'Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur',
            'description2' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source',
            'description3' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'
           ]);


    }
}
