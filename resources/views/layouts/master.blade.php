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
    <link rel="stylesheet" href="{{ asset('./css/welcome.css') }}">
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
                            <a class="nav-link" href="#">TRANG CHỦ</a>
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
            </div>
            {{-- <div class="col-2 text-center w-100 pt-1">
                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-user-circle"></i>
                    </button>
                    <div class="dropdown-menu">
                        @if (Auth::check())
                            <label class="dropdown-item" id="account_control">
                                Hi,<span id="user_name">{{ Auth::user()->name }}</span>
                                <i class="fas fa-circle" id="user_status"></i>
                            </label>
                            @if (Auth::user()->type === 'Admin')
                                <a class="dropdown-item" id="account_control" href="{{ route('admin_page') }}">Trang
                                    quản
                                    trị</a>
                            @endif
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <input type="submit" class="dropdown-item" id="account_control" value="Đăng xuất">
                            </form>
                            @if (!Auth::user()->type === 'Admin')
                                <a class="dropdown-item" id="account_control" href="#">Liên hệ</a>
                            @endif
                            <span class="dropdown-item-text" id="label_account_text">T-services hotel</span>
                            @else
                            <a class="dropdown-item" id="account_control" href="{{ route('login') }}">Đăng nhập</a>
                            <a class="dropdown-item" id="account_control" href="{{ route('register') }}">Đăng ký</a>
                            <a class="dropdown-item" id="account_control" href="#">Liên hệ</a>
                            <span class="dropdown-item-text" id="label_account_text">T-services hotel</span>
                        @endif
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    @yield('content')

    <div class="footer">
        <div class="in_out">
            <div id="t_service">
                <a id="social_network" href=""><i class="fab fa-facebook-square"></i></a>
                <a id="social_network" href=""><i class="fab fa-youtube"></i></a>
                <a id="social_network" href=""><i class="fab fa-twitter"></i></a>
                <a id="social_network" href=""><i class="fab fa-instagram"></i></a>
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
