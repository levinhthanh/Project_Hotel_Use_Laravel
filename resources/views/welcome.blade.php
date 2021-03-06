@extends('layouts.master')

@section('title', 'Sunrise Sapa Hotel - Homepage')

@section('css')
    <link rel="stylesheet" href="/css/welcome_page.css">



@section('content')

    <div class="container-fluid slide_banners_cover mt-3">
        <div class="slide_banners">

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('./images/banners/banner3.jpg') }}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="color: darkred; font-weight: bold;">XIN CHÀO !</h5>
                            <p style="color: darkorange">Rất vui khi được tiếp đón quý khách ...</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('./images/banners/banner4.jpg') }}" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="color: darkred; font-weight: bold;">SUNRISE SAPA</h5>
                            <p style="color: darkorange">Đến với chúng tôi để trải nghiệm không gian thoải mái nhất</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('./images/banners/banner5.jpg') }}" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="color: darkred; font-weight: bold;">TRẢI NGHIỆM ĐÁNG NHỚ !</h5>
                            <p style="color: darkorange">Không gian sinh hoạt và giải trí hàng đầu</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        @php
        if(!isset($checkIn)){
        $checkIn = "";
        }
        if(!isset($checkOut)){
        $checkOut = "";
        }
        @endphp
        <div class="container w-75 mt-4 mb-3 justify-content-center div_booking">
            <form action="{{ route('view_booking') }}" method="post" class="form_booking">
                @csrf
                <table class="container table table-borderless ">
                    <tbody>
                        <tr class="row pl-4 pr-4">
                            <td class="col-4">
                                <label for="in" style="color: white;">Ngày nhận</label>
                                <input name="checkIn" id="dayIn" onchange="checkDayIn(this.value)" class="container"
                                    type="date" value="{{ $checkIn }}">
                            </td>
                            <td class="col-4">
                                <label for="out" style="color: white;">Ngày trả</label>
                                <input name="checkOut" id="dayOut" onchange="checkDayOut(this.value)" class="container"
                                    type="date" value="{{ $checkOut }}">
                            </td>
                            <td class="col-4">
                                <input class="container-fluid btn pt-3 button_book" type="submit" value="ĐẶT NGAY">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="container w-75 mt-4 mb-3 justify-content-center div_booking_hidden">
            <form action="{{ route('view_booking') }}" method="post" class="form_booking">
                @csrf
                <table class="container table table-borderless ">
                    <tbody>
                        <tr class="row pl-4 pr-4">
                            <td class="col-6">
                                <label for="in" style="color: white;">Ngày nhận</label>
                                <input name="checkIn" id="dayIn" onchange="checkDayIn(this.value)" class="container"
                                    type="date" value="{{ $checkIn }}">
                            </td>
                            <td class="col-6">
                                <label for="out" style="color: white;">Ngày trả</label>
                                <input name="checkOut" id="dayOut" onchange="checkDayOut(this.value)" class="container"
                                    type="date" value="{{ $checkOut }}">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="container jusstify-content-center">
                    <input class="container btn button_book_hidden mb-3" type="submit" value="ĐẶT NGAY">
                </div>
            </form>
        </div>
        <div class="container w-75 mt-4 mb-3 justify-content-center div_booking_hidden2">
            <form action="{{ route('view_booking') }}" method="post" class="form_booking">
                @csrf
                <table class="container table table-borderless ">
                    <tbody>
                        <tr class="row pl-4 pr-4">
                            <td class="col-12">
                                <label for="in" style="color: white;">Ngày nhận</label>
                                <input name="checkIn" id="dayIn" onchange="checkDayIn(this.value)" class="container"
                                    type="date" value="{{ $checkIn }}">
                            </td>
                        </tr>
                        <tr class="row pl-4 pr-4">
                            <td class="col-12">
                                <label for="out" style="color: white;">Ngày trả</label>
                                <input name="checkOut" id="dayOut" onchange="checkDayOut(this.value)" class="container"
                                    type="date" value="{{ $checkOut }}">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="container jusstify-content-center">
                    <input class="container btn button_book_hidden mb-3" type="submit" value="ĐẶT NGAY">
                </div>
            </form>
        </div>
        <div class="container w-75 mt-4 mb-3 justify-content-center div_booking_hidden3">
            <form action="{{ route('view_booking') }}" method="post" class="pt-3 form_booking">
                @csrf
                <div class="container jusstify-content-center">
                    <input class="container btn button_book_hidden mb-3" type="submit" value="ĐẶT NGAY">
                </div>
            </form>
        </div>
    </div>

    <div class="container-fluid categories_cover mt-3 pt-5 pb-5">
        <div class="d-flex justify-content-around" id="categories_list">
            {{-- Nội dung sẽ được js trả ngược lên --}}
        </div>
        <div class="icon_view_categories text-right mt-3 pr-3">
            <a href="{{ route('view_categories') }}">Xem thêm</a>
            <a href="{{ route('view_categories') }}"><i class="fas fa-angle-double-right"></i></a>
        </div>
    </div>

@endsection


@section('javascript')
    <script src="{{ asset('libs/node_modules/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('js/welcome_page.js') }}"></script>
