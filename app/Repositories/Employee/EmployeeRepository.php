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
    public function getEmployee($id)
    {
        $employee = Employee::findOrFail($id);
        $id = $employee->user_id;
        $employee['name'] = User::find($id)->name;
        $employee['email'] = User::find($id)->email;
        $employee['status'] = User::find($id)->status;

        return $employee;
    }

    public function deleteEmployee($id)
    {
        Employee::where('id', $id)->update(['status' => "Đã xóa"]);
        $employee = Employee::findOrFail($id);
        $id = $employee->user_id;
        User::where('id', $id)->update(['status' => "Đã xóa"]);
    }

    public function getInformations()
    {
        $employees = Employee::select('id', 'birthday', 'gender', 'address', 'phone', 'possition', 'salary', 'image', 'user_id')->where('status','Hoạt động')->get();
        foreach ($employees as $key => $value) {
            $user_id = $value->user_id;
            $value['name'] = User::find($user_id)->name;
            $value['email'] = User::find($user_id)->email;
        }

        return $employees;
    }
}
