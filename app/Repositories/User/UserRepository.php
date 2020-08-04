<?php
namespace App\Repositories\User;

use App\Repositories\EloquentRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Employee;
use App\User;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return User::class;
    }

    /**
     * Lấy thông tin nhân viên từ 2 bảng employees và users
     * @return mixed
     */
    // public function getInformations()
    // {
    //     $employees = Employee::all();
    //     foreach ($employees as $key => $value) {
    //        $user_id = $value->user_id;
    //        $user = User::where('id', $user_id)->first();

    //        $value->name = $user->name;
    //        $value->email = $user->email;
    //        $value->deleted = $user->deleted;
    //     }
    //     return $employees;
    //  }

}
