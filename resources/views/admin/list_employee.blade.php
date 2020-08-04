@extends('layouts.admin')

@section('title', 'Danh sách nhân viên')

@section('content')
    <div class="content-wrapper ">
        <div class="container">
            <p class="h3" id="label_add">Danh sách nhân viên:</p>
        </div>
        <div class="container-fluid">
            <table class="table table-striped text-center" id="employees" style="width: 100%;">
                <thead>
                    <tr id="list-header">
                        <th scope="col">ID</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Chức vụ</th>
                        <th scope="col">Lương</th>
                        <th scope="col">Mức truy cập</th>
                        <th scope="col">Email</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody id="table_content">
                    @if (isset($employees))
                        @foreach ($employees as $key => $employee)
                            <tr>
                                <td scope="col">{{ $employee->id }}</td>
                                <td scope="col"><img class="w-100" src="/storage/{{ $employee->image }}"></td>
                                <td scope="col">{{ $employee->name }}</td>
                                <td scope="col">{{ $employee->birthday }}</td>
                                <td scope="col">{{ $employee->address }}</td>
                                <td scope="col">{{ $employee->phone }}</td>
                                <td scope="col">{{ $employee->possition }}</td>
                                <td scope="col">{{ number_format($employee->salary) }}</td>
                                <td scope="col">{{ $employee->role }}</td>
                                <td scope="col">{{ $employee->email }}</td>
                                <td scope="col">
                                    @php
                                    if($employee->deleted){
                                    $status = 'Đã khóa';
                                    }else {
                                    $status = 'Hoạt động';
                                    }
                                    @endphp
                                    {{ $status }}
                                </td>
                                <td scope="col">
                                    <div class="container d-flex">
                                        <div class="edit_employee">
                                            <i onclick="show_edit()" style="color: gold" class="fas fa-edit"></i>
                                            <div class="modal fade" id="dialog1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content body_edit">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Chỉnh sửa nhân viên</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">

                                                            <table class="table table-striped text-center">
                                                                <tr>
                                                                    <th>Ảnh</th>
                                                                    <td>
                                                                        <input type="file" name="image" class="form-control-file" required>
                                                                    </td>
                                                                    <th>
                                                                        <button type="button" class="btn btn-primary">Cập nhật</button>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tên</th>
                                                                    <td><input class="form-control text-center" type="text" name="name" value="{{ $employee->name }}"></td>
                                                                    <th>
                                                                        <button type="button" class="btn btn-primary">Cập nhật</button>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Ngày sinh</th>
                                                                    <td><input class="form-control text-center" type="date" name="birthday" value="{{ $employee->birthday }}"></td>
                                                                    <th>
                                                                        <button type="button" class="btn btn-primary">Cập nhật</button>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Địa chỉ</th>
                                                                    <td><input class="form-control text-center" type="text" name="address" value="{{ $employee->address }}"></td>
                                                                    <th>
                                                                        <button type="button" class="btn btn-primary">Cập nhật</button>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>SĐT</th>
                                                                    <td><input class="form-control text-center" type="text" name="phone" value="{{ $employee->phone }}"></td>
                                                                    <th>
                                                                        <button type="button" class="btn btn-primary">Cập nhật</button>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Chức vụ</th>
                                                                    <td>
                                                                        <select class="form-control" id="exampleFormControlSelect1" name="possition">
                                                                            <option value="Tiếp tân">Tiếp tân</option>
                                                                            <option value="Quản lý">Quản lý</option>
                                                                            <option value="Vệ sinh">Nhân viên vệ sinh</option>
                                                                            <option value="Bảo vệ">Nhân viên bảo vệ</option>
                                                                            <option value="IT">Nhân viên IT</option>
                                                                        </select>  </td>
                                                                    <th>
                                                                        <button type="button" class="btn btn-primary">Cập nhật</button>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Lương</th>
                                                                    <td><input class="form-control text-center" type="text" name="salary" value="{{ $employee->salary }}"></td>
                                                                    <th>
                                                                        <button type="button" class="btn btn-primary">Cập nhật</button>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Mức truy cập</th>
                                                                    <td>
                                                                        <select class="form-control" id="exampleFormControlSelect1" name="role">
                                                                            <option value="Không">Không</option>
                                                                            <option value="Cao">Cao</option>
                                                                            <option value="Thấp">Thấp</option>
                                                                        </select>  </td>
                                                                    <th>
                                                                        <button type="button" class="btn btn-primary">Cập nhật</button>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Email</th>
                                                                    <td><input class="form-control text-center" type="text" name="email" value="{{ $employee->email }}"></td>
                                                                    <th>
                                                                        <button type="button" class="btn btn-primary">Cập nhật</button>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Trạng thái</th>
                                                                    <td>
                                                                        <select class="form-control" id="exampleFormControlSelect1" name="deleted">
                                                                            <option value="true">Hoạt động</option>
                                                                            <option value="false">Đã khóa</option>
                                                                        </select>  </td>
                                                                    <th>
                                                                        <button type="button" class="btn btn-primary">Cập nhật</button>
                                                                    </th>
                                                                </tr>
                                                            </table>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Hủy bỏ</button>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="delete_employee ml-1">
                                            <i onclick="show_delete()" style="color: red" class="far fa-trash-alt"></i>
                                            <div class="modal fade" id="dialog2" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Xác nhận:</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            Bạn muốn xóa {{ $employee->name }} khỏi danh sách?
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Hủy bỏ</button>
                                                            <button type="button" class="btn btn-primary">Xóa</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif




                </tbody>
            </table>
            <button type="button" class="btn btn-primary" id="btnReloadData">Reload data</button>
        </div>


    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/admin.js') }}"></script>
@endpush
