@extends('layouts.admin')

@section('title', 'Thêm mới nhân viên')

@section('content')
    <div class="content-wrapper ">
        <div class="container">
            <p class="h3" id="label_add">Thêm nhân viên:</p>
        </div>
        <div class="container add_employee">

            <div class="error-message">
                @if ($errors->any())
                <div class="alert alert-danger bg-light">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style='color:red'>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (isset($error))
                <div class="alert alert-danger bg-light">
                    <ul>
                        <li style='color:red'>{{ $error }}</li>
                    </ul>
                </div>
                @endif
            </div>
            <p style='color:green'>{{ (isset($success)) ? $success : '' }}</p>

            <form method="post" action="{{ route('validate_employee') }}" enctype="multipart/form-data" class="mt-5 pb-5">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Họ và tên</label>
                    <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập họ tên">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Ngày sinh</label>
                    <input name="birthday" type="date" class="form-control" id="exampleFormControlInput1" placeholder="Chọn ngày sinh">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Địa chỉ</label>
                    <input name="address" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập địa chỉ">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nhập mail">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Mật khẩu</label>
                    <input name="password" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập mật khẩu">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Điện thoại</label>
                    <input name="phone" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập số điện thoại">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Chức vụ</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="possition">
                        <option value="Tiếp tân">Tiếp tân</option>
                        <option value="Quản lý">Quản lý</option>
                        <option value="Vệ sinh">Nhân viên vệ sinh</option>
                        <option value="Bảo vệ">Nhân viên bảo vệ</option>
                        <option value="IT">Nhân viên IT</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Lương</label>
                    <input name="salary" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập lương">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Mức truy cập</label>
                    <select name="role" class="form-control" id="exampleFormControlSelect1">
                        <option value="Không">Không được truy cập</option>
                        <option value="Cao">Mức thấp</option>
                        <option value="Thấp">Mức cao</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Ảnh</label>
                    <input type="file" name="image" class="form-control-file" required>
                </div>
                <div class="form-group">
                    <input id="button_admin" type="submit" class="form-control " id="exampleFormControlInput1" value="Thêm mới">
                </div>
            </form>
        </div>
    </div>
@endsection
