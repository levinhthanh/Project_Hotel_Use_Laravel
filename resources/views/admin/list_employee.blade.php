@extends('layouts.admin')

@section('title', 'Danh sách nhân viên')

@section('content')
    <div class="content-wrapper ">
        <div class="container">
            <p class="h3" id="label_add">Danh sách nhân viên:</p>
        </div>
        <div class="container-fluid add_employee">
            <table class="table table-striped" id="employees" style="width: 100%;">
                <thead>
                    <tr id="list-header">
                        <th scope="col">ID</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Chức vụ</th>
                        <th scope="col">Lương</th>
                        <th scope="col">Mức truy cập</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Email</th>
                        <th scope="col">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" id="btnReloadData">Reload data</button>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/admin.js') }}"></script>
@endpush
