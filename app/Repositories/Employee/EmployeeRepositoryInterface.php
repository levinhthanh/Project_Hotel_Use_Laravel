<?php
namespace App\Repositories\Employee;

interface EmployeeRepositoryInterface
{
    /**
     * Lấy thông tin nhân viên từ 2 bảng employees và users
     * @return mixed
     */
    public function getInformations();
}
