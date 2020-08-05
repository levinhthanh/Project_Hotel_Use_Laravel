@extends('layouts.admin')

@section('title', 'Quản lý nhân viên')

@section('content')

    <div class="content-wrapper ">
        <div class="spinner" style="display: hide;"></div>

        <div class="container">
            <div class="container pt-1">
                <a href="javascript:;" class="btn btn-success" onclick="employee.openModal()">Thêm nhân viên</a>
            </div>
            <div class="container mt-1">
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
                            <h4 class="modal-title">Thêm mới nhân viên:</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form id="frmAddEditEmployee">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{ asset('storage/nonavatar.png') }}" id="Avatar"
                                            style="width: 200px; height: 210px;" alt="">
                                        <input type="file" accept="image/*" onchange="employee.uploadAvatar(this)">
                                    </div>
                                    <div class="col-8">
                                        <input hidden id="EmployeeId" name="EmployeeId" value="0">
                                        <div class="form-group">
                                            <label>Họ và tên:</label>
                                            <input type="text" class="form-control" placeholder="Fullname" id="Fullname"
                                                name="Fullname" data-rule-required="true"
                                                data-msg-required="Fullname is required">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label>Ngày sinh:</label>
                                                <input type="date" class="form-control" placeholder="Date of birth" id="DoB"
                                                    name="DoB" data-rule-required="true"
                                                    data-msg-required="DoB is required">
                                            </div>
                                            <div class="form-group col-6">
                                                <label>Giới tính:</label>
                                                <select class="form-control" id="Gender" name="Gender"
                                                    data-rule-required="true" data-msg-required="Gender is required">
                                                    <option value="Nam">Nam</option>
                                                    <option value="Nữ">Nữ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Địa chỉ:</label>
                                            <input type="text" class="form-control" placeholder="Address" id="Address"
                                                name="Address" data-rule-required="true"
                                                data-msg-required="Address is required">
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" class="form-control" placeholder="Email" id="Email"
                                                name="Email" data-rule-required="true"
                                                data-msg-required="Email is required">
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu:</label>
                                            <input type="text" class="form-control" placeholder="Password" id="Password"
                                                name="Password" data-rule-required="true"
                                                data-msg-required="Password is required">
                                        </div>
                                        <div class="form-group">
                                            <label>Điện thoại:</label>
                                            <input type="text" class="form-control" placeholder="Phone" id="Phone"
                                                name="Phone" data-rule-required="true"
                                                data-msg-required="Phone is required">
                                        </div>
                                        <div class="form-group">
                                            <label>Chức vụ:</label>
                                            <select class="form-control" id="Possition" name="Possition"
                                                data-rule-required="true" data-msg-required="Possition is required">
                                                <option value="Tiếp tân">Tiếp tân</option>
                                                <option value="Quản lý">Quản lý</option>
                                                <option value="Vệ sinh">Nhân viên vệ sinh</option>
                                                <option value="Bảo vệ">Nhân viên bảo vệ</option>
                                                <option value="IT">Nhân viên IT</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Lương:</label>
                                            <input type="text" class="form-control" placeholder="Salary" id="Salary"
                                                name="Salary" data-rule-required="true"
                                                data-msg-required="Salary is required">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-success" onclick="employee.save()">Thêm</a>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                        </div> --}}

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
