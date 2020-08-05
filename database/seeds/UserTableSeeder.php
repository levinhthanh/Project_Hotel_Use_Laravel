<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'Admin','email' => 'admin@gmail.com', 'password' =>  bcrypt('admin'), 'type' => 'admin']);
        User::create(['name' => 'Lê Công Vinh','email' => 'lecongvinh@gmail.com', 'password' =>  bcrypt('lecongvinh'), 'type' => 'employee']);
        User::create(['name' => 'Trần Ngọc Vinh','email' => 'tranngocvinh@gmail.com', 'password' =>  bcrypt('tranngocvinh'), 'type' => 'employee']);
        User::create(['name' => 'Lê Thạnh','email' => 'lethanh@gmail.com', 'password' =>  bcrypt('lethanh'), 'type' => 'employee']);
    }
}
