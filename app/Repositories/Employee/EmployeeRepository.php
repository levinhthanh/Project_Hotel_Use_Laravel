<?php

namespace App\Repositories\Employee;

use App\Repositories\EloquentRepository;
use App\Repositories\Employee\EmployeeRepositoryInterface;
use App\Employee;
use App\User;

class EmployeeRepository extends EloquentRepository implements EmployeeRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Employee::class;
    }

    /**
     * Lấy thông tin nhân viên từ 2 bảng employees và users
     * @return mixed
     */

    public function getInformations()
    {
        $employees = Employee::select('id', 'birthday', 'gender', 'address', 'phone', 'possition', 'salary', 'image', 'user_id')->get();
        foreach ($employees as $key => $value) {
            $user_id = $value->user_id;
            $value['name'] = User::find($user_id)->name;
            $value['email'] = User::find($user_id)->email;
            if ($value['deleted'] = User::find($user_id)->deleted == 0) {
                $value['deleted'] = 'Hoạt động';
            } else {
                $value['deleted'] = 'Bị chặn';
            }
        }

        return $employees;
    }
}
