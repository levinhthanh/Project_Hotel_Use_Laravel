<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Requests\RoomRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Employee\EmployeeRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Room\RoomRepositoryInterface;

class AdminController extends Controller
{
    protected $employeeRepository;
    protected $userRepository;
    protected $categoryRepository;
    protected $roomRepository;

    public function __construct(
        EmployeeRepositoryInterface $employeeRepository,
        UserRepositoryInterface $userRepository,
        CategoryRepositoryInterface $categoryRepository,
        RoomRepositoryInterface $roomRepository
    ) {
        $this->employeeRepository = $employeeRepository;
        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
        $this->roomRepository = $roomRepository;
    }

    // *
    // **
    // ***
    // ****  QUẢN LÝ PHÒNG  *****
    public function manager_room()
    {

        return view('admin.room');
    }

    public function delete_room($id)
    {
        $this->roomRepository->deleteRoom($id);

        return response()->json("Đã xóa thành công!");
    }

    public function update_room(RoomRequest $request)
    {
        if ($this->roomRepository->isExist($request)) {
            $error = 'Tên phòng đã tồn tại';

            return response()->json($error);
        } else {
            $this->roomRepository->updateRoom($request);
            $message = "Đã cập nhật phòng thành công!";

            return response()->json($message);
        }
    }

    public function get_rooms()
    {
        $rooms = $this->roomRepository->getRooms();

        return response()->json($rooms);
    }

    public function get_room($id)
    {
        $room = $this->roomRepository->getRoom($id);

        return response()->json($room);
    }

    public function validate_room(RoomRequest $request)
    {
        if ($this->roomRepository->isExist($request)) {
            $error = 'Phòng đã tồn tại';
            return response()->json($error);
        } else {
            $this->roomRepository->addRoom($request);
            $message = "Đã thêm phòng mới!";

            return response()->json($message);
        }
    }
    // *
    // **
    // ***
    // ****  QUẢN LÝ LOẠI PHÒNG  *****
    public function manager_category()
    {

        return view('admin.category');
    }

    public function get_categories()
    {
        $categories = $this->categoryRepository->getCategories();

        return response()->json($categories);
    }

    public function get_category(Request $request)
    {
        $id = $request->id;
        $category = $this->categoryRepository->getCategory($id);

        return response()->json($category);
    }

    public function validate_category(CategoryRequest $request)
    {
        if ($this->categoryRepository->isExist($request)) {
            $error = 'Loại phòng đã tồn tại';

            return response()->json($error);
        } else {
            $this->categoryRepository->add_category($request);
            $message = "Đã thêm loại phòng mới!";

            return response()->json($message);
        }
    }

    public function update_category(CategoryRequest $request)
    {
        if ($this->categoryRepository->isExist($request)) {
            $error = 'Loại phòng đã tồn tại';

            return response()->json($error);
        } else {
            $this->categoryRepository->update_category($request);
            $message = "Đã cập nhật thành công!";

            return response()->json($message);
        }
    }

    public function delete_category($id)
    {
        $this->categoryRepository->delete_category($id);

        return response()->json("Đã xóa thành công!");
    }





    // *
    // **
    // ***
    // ****  QUẢN LÝ NHÂN VIÊN  *****
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
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image = $image->store('images', 'public');
        }
        $employee = [
            'address' => $request->address,
            'phone' => $request->phone,
            'possition' => $request->possition,
            'salary' => $request->salary,
            'image' => $image
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
}
