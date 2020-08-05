<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\User;
use App\Employee;
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

    public function manager_employee(){
        return view('admin.employee');
    }

    public function get_employees(){
        $employees = $this->employeeRepository->getInformations();
        return response()->json($employees);
    }

    // public function list_employee()
    // {
    //     $employees = $this->employeeRepository->getInformations();
    //     return view('admin.list_employee', compact('employees'));
    // }

    // public function get_employee()
    // {
    // $employees = Employee::all();
    // foreach ($employees as $key => $value) {
    //    $user_id = $value->user_id;
    //    $user = User::where('id', $user_id)->first();
    //    $value->name = $user->name;
    //    $value->email = $user->email;
    //    $value->deleted = $user->deleted;
    // }
    // return view('admin.list_employee', compact('employees'));
    // $employees = $this->employeeRepository->getAll();
    // foreach($employees as $key => $value){
    //      $id = $value->id;
    //      $this->userRepository->find($id);
    // }

    // }

    // public function validate_employee(EmployeeRequest $request)
    // {
    //     $email = $request->email;
    //     $user = $this->userRepository;
    //     if ($user->exist_email($email)) {
    //         $error = "Email đã tồn tại!";
    //         return view('admin.add_employee', compact('error'));
    //     }
    //     else {
    //         $name = $request->name;
    //         $password = $request->password;
    //         $password = bcrypt($password);
    //         $user->create(['name' => $name, 'email' => $email, 'password' => $password, 'type' => 'employee']);

            // $employee = new Employee();
            // $user_id = User::select('id')->where('email', $email)->first();
            // $employee->user_id = $user_id->id;
            // $employee->birthday = $request->birthday;
            // $employee->address = $request->address;
            // $employee->phone = $request->phone;
            // $employee->possition = $request->possition;
            // $employee->salary = $request->salary;
            // $employee->role = $request->role;
            // if ($request->hasFile('image')) {
            //     $image = $request->file('image');
            //     $path = $image->store('images', 'public');
            //     $employee->image = $path;
            // }
            // $employee->save();

    //         $success = " Đã thêm nhân viên thành công";
    //         return view('admin.add_employee', compact('success'));
    //     }
    // }

    // public function add_employee()
    // {
    //     return view('admin.add_employee');
    // }
}
