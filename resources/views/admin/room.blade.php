@extends('layouts.admin')

@section('title', 'Quản lý phòng')

    @push('css')
        <link rel="stylesheet" href="{{ asset('css/room.css') }}">
    @endpush


@section('title_content', 'Danh sách phòng')

@section('content')

    <div class="content-wrapper ">
        <div class="container pt-1 text-right">
            <a href="javascript:;" class="btn mt-2" style="color:white; background-color: #003300 !important;"
                onclick="openModalAdd()">+ Thêm phòng mới</a>
        </div>
        <div class="container mt-2">
            <table id="table_room" class="table table-bordered table-hover table-striped mt-1 text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên phòng</th>
                        <th>Loại phòng</th>
                        <th>Ảnh 1 </th>
                        <th>Ảnh 2 </th>
                        <th>Ảnh 3 </th>
                        <th>Tình trạng </th>
                        <th>Chỉnh sửa </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    <!-- The Modal Add -->
    <div class="modal" id="addRoom">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm mới phòng</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="pl-5" id="create_status" style="display: none;">
                    <table id="table_status">

                    </table>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="formAddRoom" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên phòng:</label>
                            <input type="text" class="form-control" placeholder="Nhập tên:" id="name" name="name"
                                data-rule-required="true" data-msg-required="Bạn chưa nhập tên!">
                        </div>
                        <div class="form-group">
                            <label class="mr-5">Loại phòng:</label>
                            <select name="category" id="category">

                            </select>
                        </div>
                        <label>Hình ảnh:</label><br>
                        <div class="row">
                            <div class="col-4">
                                <div class="container">
                                    <img src="{{ asset('storage/default_image.jpg') }}" id="Image1"
                                        style="width: 100%; height: auto;" alt="">
                                    <input class="container-fluid mt-2" name="image1" id="image1" type="file"
                                        accept="image/*" onchange="uploadImage1(this,'create')" data-rule-required="true"
                                        data-msg-required="Bạn chưa chọn ảnh!" style="color:darkred !important;">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="container">
                                    <img src="{{ asset('storage/default_image.jpg') }}" id="Image2"
                                        style="width: 100%; height: auto;" alt="">
                                    <input class="container-fluid mt-2" name="image2" id="image2" type="file"
                                        accept="image/*" onchange="uploadImage2(this,'create')" data-rule-required="true"
                                        data-msg-required="Bạn chưa chọn ảnh!" style="color:darkred !important;">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="container">
                                    <img src="{{ asset('storage/default_image.jpg') }}" id="Image3"
                                        style="width: 100%; height: auto;" alt="">
                                    <input class="container-fluid mt-2" name="image3" id="image3" type="file"
                                        accept="image/*" onchange="uploadImage3(this,'create')" data-rule-required="true"
                                        data-msg-required="Bạn chưa chọn ảnh!" style="color:darkred !important;">
                                </div>
                            </div>
                        </div><br>


                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-success"
                        style="color:white; background-color: #003300 !important;" onclick="add_room()">Thêm</a>
                    <button type="button" class="btn btn-danger" style="color:white; background-color: #990000 !important;"
                        data-dismiss="modal">Hủy</button>
                </div>

            </div>
        </div>
    </div>

     <!-- The Modal Edit -->
     <div class="modal" id="editRoom">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Chỉnh sửa phòng</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="pl-5" id="edit_status" style="display: none;">
                    <table id="table_edit_status">

                    </table>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="formEditRoom" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên phòng:</label>
                            <input type="text" class="form-control" placeholder="Nhập tên:" id="nameEdit" name="name">
                        </div>
                        <div class="form-group">
                            <label class="mr-5">Loại phòng:</label>
                            <select name="category" id="categoryEdit">

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mr-5">Trạng thái:</label>
                            <select name="status" id="status">
                                  <option value="Chưa sẵn sàng">Chưa sẵn sàng</option>
                                  <option value="Sẵn sàng">Sẵn sàng</option>
                                  <option value="Đang được đặt">Đang được đặt</option>
                                  <option value="Đang sử dụng">Đang sử dụng</option>
                            </select>
                        </div>
                        <label>Hình ảnh:</label><br>
                        <div class="row">
                            <div class="col-4">
                                <div class="container">
                                    <img src="{{ asset('storage/default_image.jpg') }}" id="Image1Edit"
                                        style="width: 100%; height: auto;" alt="">
                                    <input class="container-fluid mt-2" name="image1" id="image1Edit" type="file"
                                        accept="image/*" onchange="uploadImage1(this,'edit')" style="color:darkred !important;">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="container">
                                    <img src="{{ asset('storage/default_image.jpg') }}" id="Image2Edit"
                                        style="width: 100%; height: auto;" alt="">
                                    <input class="container-fluid mt-2" name="image2" id="image2Edit" type="file"
                                        accept="image/*" onchange="uploadImage2(this,'edit')" style="color:darkred !important;">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="container">
                                    <img src="{{ asset('storage/default_image.jpg') }}" id="Image3Edit"
                                        style="width: 100%; height: auto;" alt="">
                                    <input class="container-fluid mt-2" name="image3" id="image3Edit" type="file"
                                        accept="image/*" onchange="uploadImage3(this,'edit')" style="color:darkred !important;">
                                </div>
                            </div>
                        </div><br>


                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer" id="footer_edit_room">

                </div>

            </div>
        </div>
    </div>



@endsection

@push('scripts')
    <script src="{{ asset('js/room.js') }}"></script>
@endpush
