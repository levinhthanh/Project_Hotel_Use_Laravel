@extends('layouts.admin')

@section('title', 'Quản lý nhân viên')

@section('title_content', 'Danh sách nhân viên')

@section('content')

    <div class="content-wrapper ">
        <div class="spinner" style="display: hide;"></div>

        <div class="container">
            <div class="container pt-1 text-right">
                <a href="javascript:;" class="btn mt-2" style="color:white; background-color: #003300 !important;"
                    onclick="employee.openModal()">+ Thêm nhân viên</a>
            </div>
            <div class="container mt-2">
                <table id="tbEmployee" class="table table-bordered table-hover table-striped mt-1">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Ảnh</th>
                            <th>Tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Chức vụ</th>
                            <th>Lương</th>
                            <th>Email</th>
                            <th>Trạng thái</th>
                            <th>Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- The Modal -->
            <div class="modal" id="addEditEmployee">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title" style="color: darkred;">Thêm mới nhân viên:</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="pl-5" id="create_status" style="display: none;">
                            <table id="table_status">

                            </table>

                        </div>

                        <div class="modal-body">
                            <form id="formAddEditEmployee" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <div class="container">
                                            <img src="{{ asset('storage/nonavatar.png') }}" id="Avatar"
                                                style="width: 100%; height: auto;" alt="">
                                            <input name="image" id="image" type="file" accept="image/*"
                                                onchange="employee.uploadAvatar(this)" data-rule-required="true"
                                                data-msg-required="Bạn chưa chọn ảnh!" style="color:darkred !important;">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <input hidden id="EmployeeId" name="EmployeeId" value="0">
                                        <div class="form-group">
                                            <label>Họ và tên:</label>
                                            <input type="text" class="form-control" placeholder="Fullname" id="name"
                                                name="name" data-rule-required="true"
                                                data-msg-required="Bạn chưa nhập tên!">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label>Ngày sinh:</label>
                                                <input type="date" class="form-control" placeholder="Date of birth"
                                                    id="birthday" name="birthday" data-rule-required="true"
                                                    data-msg-required="Bạn chưa chọn ngày sinh!">
                                            </div>
                                            <div class="form-group col-6">
                                                <label>Giới tính:</label>
                                                <select class="form-control" id="gender" name="gender"
                                                    data-rule-required="true" data-msg-required="Bạn chưa chọn giới tính!">
                                                    <option value="Nam">Nam</option>
                                                    <option value="Nữ">Nữ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Địa chỉ:</label>
                                            <input type="text" class="form-control" placeholder="Address" id="address"
                                                name="address" data-rule-required="true"
                                                data-msg-required="Bạn chưa nhập địa chỉ!">
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" class="form-control" placeholder="Email" id="email"
                                                name="email" data-rule-required="true"
                                                data-msg-required="Bạn chưa nhập email!">
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu:</label>
                                            <input type="text" class="form-control" placeholder="Password" id="password"
                                                name="password" data-rule-required="true"
                                                data-msg-required="Bạn chưa nhập mật khẩu!">
                                        </div>
                                        <div class="form-group">
                                            <label>Điện thoại:</label>
                                            <input type="text" class="form-control" placeholder="Phone" id="phone"
                                                name="phone" data-rule-required="true"
                                                data-msg-required="Bạn chưa nhập số điện thoại!">
                                        </div>
                                        <div class="form-group">
                                            <label>Chức vụ:</label>
                                            <select class="form-control" id="possition" name="possition"
                                                data-rule-required="true" data-msg-required="Bạn chưa chọn chức vụ!">
                                                <option value="Tiếp tân">Tiếp tân</option>
                                                <option value="Quản lý">Quản lý</option>
                                                <option value="Vệ sinh">Nhân viên vệ sinh</option>
                                                <option value="Bảo vệ">Nhân viên bảo vệ</option>
                                                <option value="IT">Nhân viên IT</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Lương:</label>
                                            <input type="text" class="form-control" placeholder="Salary" id="salary"
                                                name="salary" data-rule-required="true"
                                                data-msg-required="Bạn chưa nhập lương!">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn" style="color:white; background-color: #003300 !important;"
                                onclick="employee.save()">Thêm</a>
                            <button type="button" class="btn" style="color:white; background-color: #990000 !important;"
                                data-dismiss="modal">Hủy</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <footer class="page-footer font-small blue">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
                <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
            </div>
            <!-- Copyright -->

        </footer>
    </div>


@endsection

@push('scripts')
    <script src="{{ asset('js/employee.js') }}"></script>
@endpush
