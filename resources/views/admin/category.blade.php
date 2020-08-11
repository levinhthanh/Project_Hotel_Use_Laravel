@extends('layouts.admin')

@section('title', 'Quản lý loại phòng')

    @push('css')
        <link rel="stylesheet" href="{{ asset('css/category.css') }}">
    @endpush


@section('title_content', 'Danh sách hạng phòng')

@section('content')

    <div class="content-wrapper ">
        <div class="spinner" style="display: hide;"></div>

        <div class="container">
            <table class="table table-bordered text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Chọn hạng:</th>
                        <th class="select_options">
                            <div id="icon_add">
                                <a href="javascript:;" onclick="showModalAdd()"><i class="far fa-plus-square"></i></a>
                            </div>
                            <select name="category" id="select_category" class="p-2 pl-5 pr-5"
                                onchange="loadCategory(this.value)">

                            </select>
                            <div id="icon_edit_delete">
                                <a href="javascript:;" onclick='showModalEdit()'><i class="far fa-edit"></i></a>
                                <a href="javascript:;" onclick="deleteCategory()"><i class="far fa-trash-alt"></i></a>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody id="category_content">

                </tbody>
            </table>

        </div>

        <!-- The Modal Add -->
        <div class="modal" id="addCategory">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm mới loại phòng</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="pl-5" id="create_status" style="display: none;">
                        <table id="table_status">

                        </table>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="formAddCategory" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên hạng:</label>
                                <input type="text" class="form-control" placeholder="Nhập tên:" id="name" name="name"
                                    data-rule-required="true" data-msg-required="Bạn chưa nhập tên!">
                            </div>
                            <label>Hình ảnh:</label><br>
                            <div class="row">
                                <div class="col-4">
                                    <div class="container">
                                        <img src="{{ asset('storage/default_image.jpg') }}" id="Image1"
                                            style="width: 100%; height: auto;" alt="">
                                        <input class="container-fluid mt-2" name="image1" id="image1" type="file"
                                            accept="image/*" onchange="uploadImage1(this)"
                                            data-rule-required="true" data-msg-required="Bạn chưa chọn ảnh!"
                                            style="color:darkred !important;">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="container">
                                        <img src="{{ asset('storage/default_image.jpg') }}" id="Image2"
                                            style="width: 100%; height: auto;" alt="">
                                        <input class="container-fluid mt-2" name="image2" id="image2" type="file"
                                            accept="image/*" onchange="uploadImage2(this)"
                                            data-rule-required="true" data-msg-required="Bạn chưa chọn ảnh!"
                                            style="color:darkred !important;">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="container">
                                        <img src="{{ asset('storage/default_image.jpg') }}" id="Image3"
                                            style="width: 100%; height: auto;" alt="">
                                        <input class="container-fluid mt-2" name="image3" id="image3" type="file"
                                            accept="image/*" onchange="uploadImage3(this)"
                                            data-rule-required="true" data-msg-required="Bạn chưa chọn ảnh!"
                                            style="color:darkred !important;">
                                    </div>
                                </div>
                            </div><br>
                            <div class="form-group">
                                <label>Giá theo giờ:</label>
                                <input type="text" class="form-control" placeholder="Nhập giá phòng" id="price_hour" name="price_hour"
                                    data-rule-required="true" data-msg-required="Bạn chưa nhập giá giờ!">
                            </div>
                            <div class="form-group">
                                <label>Giá theo ngày:</label>
                                <input type="text" class="form-control" placeholder="Nhập giá phòng" id="price_day" name="price_day"
                                    data-rule-required="true" data-msg-required="Bạn chưa nhập giá ngày!">
                            </div>
                            <div class="form-group">
                                <label>Mô tả 1:</label><br>
                                <textarea name="description1" id="description1" cols="90" rows="5" data-rule-required="true"
                                    data-msg-required="Bạn chưa nhập mô tả 1!"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Mô tả 2:</label><br>
                                <textarea name="description2" id="description2" cols="90" rows="5" data-rule-required="true"
                                    data-msg-required="Bạn chưa nhập mô tả 2!"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Mô tả 3:</label><br>
                                <textarea name="description3" id="description3" cols="90" rows="5" data-rule-required="true"
                                    data-msg-required="Bạn chưa nhập mô tả 3!"></textarea>
                            </div>

                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-success"
                            style="color:white; background-color: #003300 !important;" onclick="add_category()">Thêm</a>
                        <button type="button" class="btn btn-danger"
                            style="color:white; background-color: #990000 !important;" data-dismiss="modal">Hủy</button>
                    </div>

                </div>
            </div>
        </div>

         <!-- The Modal Edit -->
         <div class="modal" id="editCategory">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Chỉnh sửa loại phòng</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="pl-5" id="edit_status" style="display: none;">
                        <table id="edit_category_status">

                        </table>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="formEditCategory" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên hạng:</label>
                                <input type="text" class="form-control" placeholder="Nhập tên:" id="name_edit" name="name"
                                    data-rule-required="true" data-msg-required="Bạn chưa nhập tên!">
                            </div>
                            <label>Hình ảnh:</label><br>
                            <div class="row">
                                <div class="col-4">
                                    <div class="container">
                                        <img src="" id="editImage1"
                                            style="width: 100%; height: auto;" alt="">
                                        <input class="container-fluid mt-2" name="image1" id="image1" type="file"
                                            accept="image/*" onchange="uploadImage1(this)">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="container">
                                        <img src="" id="editImage2"
                                            style="width: 100%; height: auto;" alt="">
                                        <input class="container-fluid mt-2" name="image2" id="image2" type="file"
                                            accept="image/*" onchange="uploadImage2(this)">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="container">
                                        <img src="" id="editImage3"
                                            style="width: 100%; height: auto;" alt="">
                                        <input class="container-fluid mt-2" name="image3" id="image3" type="file"
                                            accept="image/*" onchange="uploadImage3(this)">
                                    </div>
                                </div>
                            </div><br>
                            <div class="form-group">
                                <label>Giá theo giờ:</label>
                                <input type="text" class="form-control" placeholder="Nhập giá phòng" id="price_hour_edit" name="price_hour">
                            </div>
                            <div class="form-group">
                                <label>Giá theo ngày:</label>
                                <input type="text" class="form-control" placeholder="Nhập giá phòng" id="price_day_edit" name="price_day">
                            </div>
                            <div class="form-group">
                                <label>Mô tả 1:</label><br>
                                <textarea name="description1" id="description1_edit" cols="90" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Mô tả 2:</label><br>
                                <textarea name="description2" id="description2_edit" cols="90" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Mô tả 3:</label><br>
                                <textarea name="description3" id="description3_edit" cols="90" rows="5"></textarea>
                            </div>

                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer" id="edit_footer">

                    </div>

                </div>
            </div>
        </div>

        <footer class="page-footer font-small blue">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
                <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
            </div>
            <!-- Copyright -->

        </footer>
    </div>


@endsection

@push('scripts')
    <script src="{{ asset('js/category.js') }}"></script>
@endpush
