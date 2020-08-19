<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<title>@yield('title')</title>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('./css/fontawesome/css/all.css') }}">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/welcome.css">
    @yield('css')
</head>

<body>
    <div class="container-fluid header_hotel">
        <div class="row">
            <div class="col-4 text-center w-100">
                <img src="{{ asset('./images/logo/logo_hotel.gif') }}" class="container" id="logo_page" alt="logo">
            </div>
            <div class="col-8">
                <nav class="row navbar navbar-expand-sm bg-light navbar-light w-100 ">
                    <ul class="navbar-nav d-flex justify-content-center w-100">
                        <li class="nav-item active mr-3">
                            <a class="nav-link" href="{{ route('welcome') }}">TRANG CHỦ</a>
                        </li>
                        <li class="nav-item active mr-3">
                            <a class="nav-link" href="#">GIỚI THIỆU</a>
                        </li>
                        <li class="nav-item active mr-3">
                            <a class="nav-link" href="{{ route('view_categories') }}">HẠNG PHÒNG</a>
                        </li>
                        <li class="nav-item active mr-3">
                            <a class="nav-link" href="#">BÀI VIẾT</a>
                        </li>
                        <li class="nav-item active mr-3">
                            <a class="nav-link" href="#">CÁ NHÂN</a>
                        </li>
                        <li class="nav-item active mr-3">
                            <a class="nav-link" href="#">KHUYẾN MÃI</a>
                        </li>
                        <li class="nav-item active mr-3">
                            <a class="nav-link" href="#">LIÊN HỆ</a>
                        </li>

                    </ul>
                </nav>
                <div class="d-flex justify-content-end pr-5">
                    <p class="text-danger">28 Nguyễn Tri Phương, Phú Hội, TP. Huế, Thừa Thiên Huế. Hotline:
                        (+84)999.999.999</p>
                </div>
                <div class="d-flex justify-content-end pr-5">
                    @php
                    if(Auth::check()){
                    $display_link = 'block';
                    }
                    else {
                    $display_link = 'none';
                    }
                    @endphp
                    <div class="col-2 text-center w-100 pt-1" style="display: {{ $display_link }}">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <i class="fas fa-user-circle"></i>
                            </button>
                            <div class="dropdown-menu">

                                <label class="dropdown-item" id="account_control">
                                    Hi,<span id="user_name">{{ Auth::user()->name ?? '' }}</span>
                                    <i class="fas fa-circle" id="user_status"></i>
                                </label>

                                <a class="dropdown-item" id="account_control" href="{{ route('admin_page') }}">Trang
                                    quản
                                    trị</a>

                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <input type="submit" class="dropdown-item" id="account_control" value="Đăng xuất">
                                </form>

                                <span class="dropdown-item-text" id="label_account_text">T-services hotel</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid header_hotel_hidden">
        <div class="row justify-content-center">
            <div class="col-4 text-center w-100">
                <img src="{{ asset('./images/logo/logo_hotel.gif') }}" class="container" id="logo_page" alt="logo">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <nav class="row navbar navbar-expand-sm bg-light navbar-light w-100 ">
                    <ul class="navbar-nav d-flex justify-content-center w-100">
                        <li class="nav-item active mr-3">
                            <a class="nav-link" href="{{ route('welcome') }}">TRANG CHỦ</a>
                        </li>
                        <li class="nav-item active mr-3">
                            <a class="nav-link" href="#">GIỚI THIỆU</a>
                        </li>
                        <li class="nav-item active mr-3">
                            <a class="nav-link" href="{{ route('view_categories') }}">HẠNG PHÒNG</a>
                        </li>
                        <li class="nav-item active mr-3">
                            <a class="nav-link" href="#">BÀI VIẾT</a>
                        </li>
                        <li class="nav-item active mr-3">
                            <a class="nav-link" href="#">CÁ NHÂN</a>
                        </li>
                        <li class="nav-item active mr-3">
                            <a class="nav-link" href="#">KHUYẾN MÃI</a>
                        </li>
                        <li class="nav-item active mr-3">
                            <a class="nav-link" href="#">LIÊN HỆ</a>
                        </li>

                    </ul>
                </nav>
                <div class="d-flex justify-content-end pr-5">
                    <p class="text-danger">28 Nguyễn Tri Phương, Phú Hội, TP. Huế, Thừa Thiên Huế. Hotline:
                        (+84)999.999.999</p>
                </div>
                <div class="d-flex justify-content-end pr-5">
                    @php
                    if(Auth::check()){
                    $display_link = 'block';
                    }
                    else {
                    $display_link = 'none';
                    }
                    @endphp
                    <div class="col-2 text-center w-100 pt-1" style="display: {{ $display_link }}">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <i class="fas fa-user-circle"></i>
                            </button>
                            <div class="dropdown-menu">

                                <label class="dropdown-item" id="account_control">
                                    Hi,<span id="user_name">{{ Auth::user()->name ?? '' }}</span>
                                    <i class="fas fa-circle" id="user_status"></i>
                                </label>

                                <a class="dropdown-item" id="account_control" href="{{ route('admin_page') }}">Trang
                                    quản
                                    trị</a>

                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <input type="submit" class="dropdown-item" id="account_control" value="Đăng xuất">
                                </form>

                                <span class="dropdown-item-text" id="label_account_text">T-services hotel</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @yield('content')

    <div class="footer">
        <div class="in_out justify-content-center" style="display: flex">
            <div class="w-50 footer_left">
                <p class="h4 pb-1 pt-3" style="color: darkorange">SUNRISE SAPA HOTEL</p>
                <p class="text">Địa chỉ: 28 Nguyễn Tri Phương, Phú Hội, TP. Huế, Thừa Thiên Huế</p>
                <p class="text">Hotline: (+84)999.999.999</p>
                <div id="t_service">
                    <a id="social_network" href=""><i class="fab fa-facebook-square"></i></a>
                    <a id="social_network" href=""><i class="fab fa-youtube"></i></a>
                    <a id="social_network" href=""><i class="fab fa-twitter"></i></a>
                    <a id="social_network" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer_right">
                <p class="h4 pb-1 pt-3" style="color: darkorange">Chính sách của chúng tôi</p>
                <p class="text">- Phục vụ tận tình, chu đáo</p>
                <p class="text">- Mang lại dịch vụ nghĩ dưỡng tốt nhất cho khách hàng</p>
                <p class="text">- Luôn luôn lắng nghe và cải tiến chất lượng dịch vụ</p>
            </div>
        </div>
    </div>
    <div class="footer_hidden">
        <div class="in_out_hidden">
            <div class="footer_left ml-5">
                <p class="h4 pb-1 pt-3" style="color: darkorange">SUNRISE SAPA HOTEL</p>
                <p class="text">Địa chỉ: 28 Nguyễn Tri Phương, Phú Hội, TP. Huế, Thừa Thiên Huế</p>
                <p class="text">Hotline: (+84)999.999.999</p>
                <div id="t_service">
                    <a id="social_network" href=""><i class="fab fa-facebook-square"></i></a>
                    <a id="social_network" href=""><i class="fab fa-youtube"></i></a>
                    <a id="social_network" href=""><i class="fab fa-twitter"></i></a>
                    <a id="social_network" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer_right ml-5">
                <p class="h4 pb-1 pt-3" style="color: darkorange">Chính sách của chúng tôi</p>
                <p class="text">- Phục vụ tận tình, chu đáo</p>
                <p class="text">- Mang lại dịch vụ nghĩ dưỡng tốt nhất cho khách hàng</p>
                <p class="text">- Luôn luôn lắng nghe và cải tiến chất lượng dịch vụ</p>
            </div>
        </div>
    </div>

</body>

{{-- Bootstrap --}}
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
{{-- jQuery --}}
<script src="{{ asset('libs/node_modules/jquery/dist/jquery.js') }}"></script>

@yield('javascript')

</html>
