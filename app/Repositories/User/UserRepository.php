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
    public function exist_email($email){
        $check = User::where('email', $email)->first();
        if($check){
             return true;
        }else{
            return false;
        }
    }

}
