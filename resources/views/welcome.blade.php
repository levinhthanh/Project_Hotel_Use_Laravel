@extends('layouts.master')

@section('title', 'My hotel - Homepage')

@section('css')
    <link rel="stylesheet" href="./css/welcome.css">



@section('content')

    <div class="in_out">
        <div id="t_service">
            <a id="social_network" href=""><i class="fab fa-facebook-square"></i></a>
            <a id="social_network" href=""><i class="fab fa-youtube"></i></a>
            <a id="social_network" href=""><i class="fab fa-twitter"></i></a>
            <a id="social_network" href=""><i class="fab fa-instagram"></i></a>
        </div>

        <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-user-circle"></i>
            </button>
            <div class="dropdown-menu">
                @if(Auth::check())
                    <label class="dropdown-item" id="account_control">
                        Hi,<span id="user_name">{{ Auth::user()->name }}</span>
                        <i class="fas fa-circle" id="user_status"></i>
                    </label>
                    @if(Auth::user()->type === 'admin')
                        <a class="dropdown-item" id="account_control" href="{{ route('admin_page') }}">Trang quản trị</a>
                    @endif
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input type="submit" class="dropdown-item" id="account_control" value="Đăng xuất">
                    </form>
                    @if(!Auth::user()->type === 'admin')
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
    </div>

    <div class="main_view">
        <div class="directions">
            <div class="label_home">
                <a id="a_color" href="">My-Hotel</a>
            </div>
            <div class="drop_menu">
                <i onclick="show_menu()" id="dropdown_menu" class="fas fa-align-justify"></i>
            </div>
        </div>
        <div class="menu" id="menu_block">
            <div class="header_menu">
                <i class="fas fa-align-justify"></i>
                <label>MENU</label>
                <i onclick="hidden_menu()" id="hidden_menu" class="fas fa-times-circle"></i>
            </div>
            <div class="div1">
                <a href="">Khách sạn</a>
                {{-- Giới thiệu chung--}}
            </div>
            <div class="div1">
                <a href="">Đặt phòng</a>
            </div>
            <div class="div1">
                <a href="">Dich vụ</a>
            </div>
            <div class="div1">
                <a href="">Hạng phòng</a>
            </div>
            <div class="div1">
                <a href="">Bài viết</a>
            </div>
            <div class="div1">
                <a href="">Khuyến mãi</a>
            </div>
            <div class="div1">
                <a href="">Liên hệ</a>
            </div>
        </div>
        <div class="welcome" id="welcome_block">
            <h1 id="label_welcome">Welcome to My hotel</h1>
            <p id="p_welcome">Rất hân hạnh được tiếp đón quý khách!</p>
        </div>
        <form action="" method="post" class="book_room" id="book_block">
            <table class="table_book_room">
                <tr>
                    <td id="selections_book">Ngày nhận</td>
                    <td id="selections_book">Ngày trả</td>
                </tr>
                <tr>
                    <td id="selections_book"><input id="date_book" type="date" name="check_in"></td>
                    <td id="selections_book"><input id="date_book" type="date" name="check_out"></td>
                </tr>
            </table>
            <input class="button_book_room" type="submit" value="ĐẶT NGAY">
        </form>
    </div>

    <div class="categories">
        <div class="container">
            <label id="select_category"> 4 LỰA CHỌN CHO BẠN</label>
            <div class="row">
                @foreach($categories as $key => $category)
                    <div class="col-sm aos-animate">
                        <img src="images/categories/{{ $category->image }}" class="img-fluid" alt="image">
                        <a href="">{{ $category->name }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection


@section('javascript')
    <script src="js/show_menu.js"></script>
