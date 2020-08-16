<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sunrise Sapa - Thanh toán</title>
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
                                style="font-size: 2vw; color:darkgray;"></i>
                            <a href="{{ route('confirm_info') }}" class="text-reset text-decoration-none">
                                <p>THÔNG TIN KHÁCH HÀNG</p>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <i class="fas fa-chevron-circle-right pr-1" id="step4_icon"
                                style="font-size: 2vw; color:darkorange;"></i>
                            <p>THANH TOÁN</p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="container justify-content-center">
            <p class="container h5 text-center pb-2" style="color: darkred">Qúy khách vui lòng chọn hình thức thanh
                toán:</p>
            <div class="container justify-content-center">
            <form action="{{route('finish_booking')}}" method="post">
                    @csrf
                    <select id="selectPayment" onchange="getAccount()" class="container form-control w-50 text-center" name="payment">
                        <option value="money">Tiền mặt</option>
                        <option value="banking">Chuyển khoản</option>
                        <option value="wallet">Ví điện tử</option>
                    </select>
                    <div class="container text-center">
                        <p class="mt-3" style="color: darkturquoise" id="paymentContent"></p>
                        <input class="btn w-25 mt-3" style="background-color: darkorange;color:white; border:none;"
                            type="submit" value="XÁC NHẬN">
                    </div>
                </form>
            </div>


        </div>





    </div>


</body>
{{-- jQuery --}}
<script src="{{ asset('libs/node_modules/jquery/dist/jquery.js') }}"></script>
{{-- Bootstrap --}}
<script src="{{ asset('libs/node_modules/bootstrap/dist/js/bootstrap.js') }}"></script>
<script src="{{ asset('js/payment.js') }}"></script>


</html>
