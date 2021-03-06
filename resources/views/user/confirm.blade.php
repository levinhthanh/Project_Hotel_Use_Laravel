<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sunrise Sapa - Thông tin khách hàng</title>
    <link rel="stylesheet" href="{{ asset('libs/node_modules/bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.css') }}">


</head>

<body>
    <div class="container justify-content-center">
        <div class="container text-center">
            <a href="{{ route('welcome') }}"><img src="{{ asset('./images/logo/logo_hotel.gif') }}" alt="logo"></a>
        </div>

        <div class="container-fluid w-75">
            <table class="table">
                <tr>
                    <td>
                        <div class="row">
                            <i class="fas fa-chevron-circle-right pr-1" id="step1_icon"
                                style="font-size: 2vw; color:darkgray;"></i>
                            <a href="{{ route('view_booking_page') }}" class="text-reset text-decoration-none">
                                <p>THÔNG TIN ĐẶT PHÒNG</p>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <i class="fas fa-chevron-circle-right pr-1" id="step2_icon"
                                style="font-size: 2vw; color:darkgray;"></i>
                            <a href="{{ route('view_check_rooms') }}" class="text-reset text-decoration-none">
                                <p>CHỌN PHÒNG</p>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <i class="fas fa-chevron-circle-right pr-1" id="step3_icon"
                                style="font-size: 2vw; color:darkorange;"></i>
                            <a href="{{ route('confirm_info') }}" class="text-reset text-decoration-none">
                                <p>THÔNG TIN KHÁCH HÀNG</p>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <i class="fas fa-chevron-circle-right pr-1" id="step4_icon"
                                style="font-size: 2vw; color:darkgray;"></i>
                            <p>THANH TOÁN</p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="container justify-content-center">
            <p class="container h5 text-center pb-2" style="color: darkred">Xin mời quý khách nhập thông tin cá nhân để
                được phục vụ nhanh chóng:</p>
            <div class="container error-message">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style='color:red'>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <p style='color:green'>{{ isset($success) ? $success : '' }}</p>
            <form action="{{ route('validate_customer') }}" method="POST">
                @csrf
                <table class="table  table-borderless container w-50">
                    <thead>
                        <tr>
                            <th class="form-control pt-3">Tên quý khách</th>
                        <td><input class="form-control" type="text" name="name" value="{{$name ?? ""}}" placeholder="Tên" required></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="form-control pt-3">Số điện thoại</th>
                            <td><input class="form-control" type="text" name="phone" value="{{$phone ?? ""}}" placeholder="Điện thoại" required>
                            </td>
                        </tr>
                        <tr>
                            <th class="form-control pt-3">Email</th>
                            <td><input class="form-control" type="email" name="email" value="{{$email ?? ""}}" placeholder="Email" required></td>
                        </tr>
                    </tbody>
                </table>
                <div class="container text-center">
                    <button class="w-25 btn btn-success" style="background-color: darkorange; border:none;">XÁC NHẬN
                        THÔNG TIN</button>
                </div>
            </form>
        </div>





    </div>


</body>
{{-- jQuery --}}
<script src="{{ asset('libs/node_modules/jquery/dist/jquery.js') }}"></script>
{{-- Bootstrap --}}
<script src="{{ asset('libs/node_modules/bootstrap/dist/js/bootstrap.js') }}"></script>



</html>
