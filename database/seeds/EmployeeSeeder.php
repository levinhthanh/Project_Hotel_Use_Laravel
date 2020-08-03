<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('employees')->insert([
        //     'birthday' => '1992-08-19',
        //     'address' => 'Huế, Việt Nam',
        //     'phone' => '0905555555',
        //     'possition' => 'quanly',
        //     'salary' => '10000000',
        //     'role' => 'high',
        //     'image' => 'vinh.jpg',
        //     'user_id' => 1
        // ]);

        DB::table('employees')->insert([
            'birthday' => '1984-01-19',
            'address' => 'Nghệ An, Việt Nam',
            'phone' => '0905555000',
            'possition' => 'quanly',
            'salary' => '10000000',
            'role' => 'high',
            'image' => 'vinh.jpg',
            'user_id' => 2
        ]);
    }
}
