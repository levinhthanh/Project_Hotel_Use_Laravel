<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sunrise Sapa - Chọn phòng</title>
    <link rel="stylesheet" href="{{ asset('libs/node_modules/bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/selection_page.css') }}">

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
                                style="font-size: 2vw; color:darkorange;"></i>
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
                                style="font-size: 2vw; color:darkgray;"></i>
                            <p>THANH TOÁN</p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="row">
            <div class="col-8">
                <div class="rooms">

                    @if (count($rooms) == 0)
                        <tr>
                            <td colspan="4">Không còn phòng trống</td>
                        </tr>
                    @else
                        @foreach ($rooms as $key => $room)
                            <div class="container row selections pt-4 mb-2">
                                <div class="col-4">
                                    <img src="/storage/{{ $room->image1 }}" alt="" style="width:100%; height:auto;">
                                </div>
                                <div class="col-8">
                                    <p class="h4">{{ $room->category->name }}</p>
                                    <p>Phòng: {{ $room->name }}</p>
                                    <p>{{ $room->category->description1 }}</p>
                                    <p>Giá: {{ number_format($room->category->price_hour) }}đ/giờ -
                                        {{ number_format($room->category->price_day) }}đ/ngày</p>


                                    @php
                                    if(isset($infoBooking)){
                                    $room->add = "display:block;";
                                    $room->sub = "display:none;";
                                    foreach ($infoBooking as $key => $value) {
                                    if($key == $room->name){
                                    $room->add = "display:none;";
                                    $room->sub = "display:block;";
                                    }
                                    }
                                    }
                                    else {
                                    $room->add = "display:block;";
                                    $room->sub = "display:none;";
                                    }
                                    @endphp
                                    <form action="/select/{{ $room->id }}" method="post">
                                        @csrf
                                        <input type="submit" value="CHỌN PHÒNG" class="btn btn-success"
                                            style="{{ $room->add }}">
                                    </form>
                                    <form action="/unselect/{{ $room->id }}" method="post">
                                        @csrf
                                        <input type="submit" value="BỎ CHỌN" class="btn btn-danger"
                                            style="{{ $room->sub }}">
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>

            </div>
            <div class="col-4">
                <table class="table" id="table_booking">
                    <thead>
                        <tr>
                            <th scope="col">Phòng</th>
                            <th scope="col">Giá</th>
                        </tr>

                    </thead>
                    <tbody id="table_tbody_booking">

                        @php
                        if(isset($infoBooking)){
                        foreach ($infoBooking as $key => $value) {
                        echo "
                        <tr>
                            <td>$key</td>
                            <td>$value</td>
                        </tr>
                        ";
                        }
                        }
                        @endphp

                    </tbody>
                </table>
                <a href="{{ route('confirm_info') }}" class="btn" style="background-color: darkorange; color:white;">XÁC
                    NHẬN ĐẶT PHÒNG</a>

            </div>
        </div>




    </div>


</body>
{{-- jQuery --}}
<script src="{{ asset('libs/node_modules/jquery/dist/jquery.js') }}"></script>
{{-- Bootstrap --}}
<script src="{{ asset('libs/node_modules/bootstrap/dist/js/bootstrap.js') }}"></script>



</html>
