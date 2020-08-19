<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<title>@yield('title')</title>
@stack('css')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('libs/node_modules/bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=PT+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <div>
                        <h2 style="color: darkred">@yield('title_content')</h2>
                    </div>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input type="submit" class="btn btn-primary" id="account_control" value="Đăng xuất">
                </form>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('admin_page') }}" class="brand-link">
                <img src="{{ asset('./images/logo/logo_hotel.jpg') }}" alt="logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SUNRISE SAPA</span>
            </a>
            @php
            use App\Employee;
            if(Auth::user()->type == 'Admin'){
            $img = '/admin.jpg';
            $display_role = 'block';
            }else {
            $display_role = 'none';
            $user_id = Auth::user()->id;
            $employee_id = Employee::select('id')->where('user_id','=',$user_id)->get();
            $employee_id = $employee_id[0]->id;
            $employee = Employee::find($employee_id);
            $img = "/storage"."/".$employee->image;
            }


            @endphp
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ $img }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item" style="display: {{ $display_role }}">
                            <a href="{{ route('manager_employee') }}" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Quản lý nhân viên</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Quản lý khách hàng
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="product_list" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách khách hàng</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Khách hàng đang ở</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Khách đang đặt phòng</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}

                        <li class="nav-item has-treeview" style="display: {{ $display_role }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Quản lý phòng
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                {{-- <li class="nav-item">
                                    <a href="product_list" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bản đồ</p>
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="{{ route('manager_category') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Hạng phòng</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('manager_room') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách phòng</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Quản lý dịch vụ khác
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="product_list" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách sản phẩm</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách dịch vụ</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Quản lý thuê phòng
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('manager_booking') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách đăng ký</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('manager_receive') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Nhận phòng</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('manager_repay') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Trả phòng</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('manager_print_bill') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>In hóa đơn</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
    </div>
    <div class="content">

        @yield('content')

    </div>
    <script src="{{ asset('libs/node_modules/jquery/dist/jquery.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="{{ asset('libs/node_modules/bootstrap/dist/js/bootstrap.js') }}"></script>
    <script src="{{ asset('libs/node_modules/jquery-validation/dist/jquery.validate.js') }}"></script>
    <script src="{{ asset('libs/node_modules/bootbox/bootbox.js') }}"></script>
    <script src="{{ asset('js/employee.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('vendor/dist/js/adminlte.js') }}"></script>
</body>

@stack('scripts')
