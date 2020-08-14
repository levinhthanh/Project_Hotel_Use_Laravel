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
                            <a href="{{ route('view_booking_page') }}">
                                <p>THÔNG TIN ĐẶT PHÒNG</p>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <i class="fas fa-chevron-circle-right pr-1" id="step2_icon"
                                style="font-size: 2vw; color:darkgray;"></i>
                            <p>CHỌN PHÒNG</p>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <i class="fas fa-chevron-circle-right pr-1" id="step3_icon"
                                style="font-size: 2vw; color:darkorange;"></i>
                            <p>THÔNG TIN KHÁCH HÀNG</p>
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





    </div>


</body>
{{-- jQuery --}}
<script src="{{ asset('libs/node_modules/jquery/dist/jquery.js') }}"></script>
{{-- Bootstrap --}}
<script src="{{ asset('libs/node_modules/bootstrap/dist/js/bootstrap.js') }}"></script>



</html>
