<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Repositories\Employee\EmployeeRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;

class AdminController extends Controller
{
    protected $employeeRepository;
    protected $userRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository, UserRepositoryInterface $userRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->userRepository = $userRepository;
    }

    public function manager_employee()
    {

        return view('admin.employee');
    }

    public function get_employees()
    {
        $employees = $this->employeeRepository->getInformations();

        return response()->json($employees);
    }

    public function get_employee($id)
    {
        $employee = $this->employeeRepository->getEmployee($id);

        return response()->json($employee);
    }

    public function update_employee(UpdateEmployeeRequest $request)
    {
        $id = $request->id;
        $address = $request->address;
        $phone = $request->phone;
        $possition = $request->possition;
        $salary = $request->salary;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $image = $path;
        }
        $employee = [
             'address' => $address, 'phone' => $phone,
            'possition' => $possition, 'salary' => $salary, 'image' => $image
        ];
        $this->employeeRepository->update($id, $employee);
        $message = "Đã cập nhật nhân viên thành công!";

        return response()->json($message);
    }

    public function delete_employee($id)
    {
        $this->employeeRepository->deleteEmployee($id);

        return response()->json("Đã xóa thành công!");
    }

    public function validate_employee(EmployeeRequest $request)
    {
        $email = $request->email;
        $user = $this->userRepository;
        if ($user->exist_email($email)) {
            $message = "Email đã tồn tại!";
            return response()->json($message);
        } else {

            $name = $request->name;
            $password = $request->password;
            $password = bcrypt($password);
            $this->userRepository->create(['name' => $name, 'email' => $email, 'password' =>  $password, 'type' => 'Nhân viên']);

            $birthday = $request->birthday;
            $gender = $request->gender;
            $address = $request->address;
            $phone = $request->phone;
            $possition = $request->possition;
            $salary = $request->salary;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = $image->store('images', 'public');
                $image = $path;
            }
            $user_id = User::select('id')->where('email', $email)->first();
            $user_id = $user_id->id;
            $employee = [
                'birthday' => $birthday, 'gender' => $gender, 'address' => $address, 'phone' => $phone,
                'possition' => $possition, 'salary' => $salary, 'image' => $image, 'user_id' => $user_id
            ];
            $this->employeeRepository->create($employee);

            $message = "Đã thêm nhân viên mới!";

            return response()->json($message);
        }
    }



    // public function add_employee()
    // {
    //     return view('admin.add_employee');
    // }
}
