@extends('layouts.admin')

@section('title', 'Quản lý nhận phòng')

    {{-- @push('css')
    <link rel="stylesheet" href="{{ asset('css/room.css') }}">
    @endpush --}}


@section('title_content', 'Danh sách đặt phòng')

@section('content')

    <div class="content-wrapper">

        @if (Auth::check())
            <input type="hidden" name="" id="user_email" value="{{ Auth::user()->email }}">
        @endif

        <div class="container mt-2 ml-5">
            <table id="table_booking" class="table table-bordered table-hover table-striped mt-1 text-center w-75">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Khách hàng</th>
                        <th>Điện thoại</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>


                </tbody>
            </table>
        </div>
    </div>



    <!-- The Modal Edit -->
    <div class="modal" id="receive_info">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thông tin đặt phòng</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="pl-5" id="edit_status" style="display: none;">
                    <table id="table_edit_status">

                    </table>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Khách hàng</th>
                            <td id="customer_name"></td>
                        </tr>
                        <tr>
                            <th>Điện thoại</th>
                            <td id="customer_phone"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td id="customer_email"></td>
                        </tr>
                        <tr>
                            <th>Ngày đến</th>
                            <td id="customer_in"></td>
                        </tr>
                        <tr>
                            <th>Ngày đi</th>
                            <td id="customer_out"></td>
                        </tr>
                        <tr>
                            <th>Phòng thuê</th>
                            <td id="customer_room"></td>
                        </tr>
                        <tr>
                            <th>Hình thức thanh toán</th>
                            <td id="customer_payment"></td>
                        </tr>
                    </table>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <div class="row justify-content-center" id="receive_confirm">

                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection

@push('scripts')
    <script src="{{ asset('js/receive.js') }}"></script>
@endpush
