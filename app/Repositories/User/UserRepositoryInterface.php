<?php
namespace App\Repositories\User;

interface UserRepositoryInterface
{
    /**
     * Kiểm tra email đã tồn tại hay chưa?
     * @return mixed
     */
    public function exist_email($email);
}
