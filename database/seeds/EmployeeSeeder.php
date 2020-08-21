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
        DB::table('employees')->insert([
            'birthday' => '1984-01-19',
            'gender' => 'Nam',
            'address' => 'Nghệ An, Việt Nam',
            'phone' => '0905555000',
            'possition' => 'Quản lý',
            'salary' => '10000000',
            'image' => 'images/employees/vinh.jpg',
            'user_id' => 2
        ]);

        DB::table('employees')->insert([
            'birthday' => '1994-05-19',
            'gender' => 'Nam',
            'address' => 'Huế, Việt Nam',
            'phone' => '0905200200',
            'possition' => 'Tiếp tân',
            'salary' => '8000000',
            'image' => 'images/employees/vinhboss.jpg',
            'user_id' => 3
        ]);

        DB::table('employees')->insert([
            'birthday' => '1999-05-30',
            'gender' => 'Nam',
            'address' => 'Huế, Việt Nam',
            'phone' => '0912321123',
            'possition' => 'IT',
            'salary' => '8000000',
            'image' => 'images/employees/thanh.png',
            'user_id' => 4
        ]);
    }
}
