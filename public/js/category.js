function add_category() {
    if ($("#formAddCategory").valid()) {
        var formData = new FormData($("#formAddCategory")[0]);
        formData.append('name', $("#name").val());
        formData.append('price_hour', $("#price_hour").val());
        formData.append('price_day', $("#price_day").val());
        formData.append('image1', $('#image1')[0].files[0]);
        formData.append('image2', $('#image2')[0].files[0]);
        formData.append('image3', $('#image3')[0].files[0]);
        formData.append('description1', $("#description1").val());
        formData.append('description2', $("#description2").val());
        formData.append('description3', $("#description3").val());

        $.ajax({
            url: "/api/category",
            method: 'POST',
            dataType: 'json',
            contentType: false,
            processData: false,
            data: formData,
            success: function (data) {
                if(data == 'Loại phòng đã tồn tại'){
                    document.getElementById('table_status').innerHTML = "";
                    document.getElementById('create_status').style = 'display:block';
                    $('#table_status').append(`<tr><td style="color:red;">- ${data}</td></tr>`)
                }else{
                    $("#addCategory").modal('hide');
                    bootbox.alert(data);
                    loadSelectionsCategory();
                    loadCategory(1);
                }
            },
            error: function (data) {
                document.getElementById('table_status').innerHTML = "";
                document.getElementById('create_status').style = 'display:block';
                errors = data.responseJSON.errors;
                $.each(errors, function (key, value) {
                    $('#table_status').append(`<tr><td style="color:red;">- ${value}</td></tr>`)
                })
            }
        })
    }
}

function update_category(id) {
        var formData = new FormData($("#formEditCategory")[0]);
        formData.append('id', id);
        formData.append('name', $("#name_edit").val());
        formData.append('price_hour', $("#price_hour_edit").val());
        formData.append('price_day', $("#price_day_edit").val());
        if( $('#image1')[0].files[0] != ""){
            formData.append('image1', $('#image1')[0].files[0]);
        }
        if( $('#image2')[0].files[0] != ""){
            formData.append('image2', $('#image2')[0].files[0]);
        }
        if( $('#image3')[0].files[0] != ""){
            formData.append('image3', $('#image3')[0].files[0]);
        }
        formData.append('description1', $("#description1_edit").val());
        formData.append('description2', $("#description2_edit").val());
        formData.append('description3', $("#description3_edit").val());

        $.ajax({
            url: '/api/category/update',
            method: 'POST',
            dataType: 'json',
            contentType: false,
            processData: false,
            data: formData,
            success: function (data) {
                if(data == 'Loại phòng đã tồn tại'){
                    document.getElementById('edit_category_status').innerHTML = "";
                    document.getElementById('edit_status').style = 'display:block';
                    $('#edit_category_status').append(`<tr><td style="color:red;">- ${data}</td></tr>`)
                }else{
                    $("#editCategory").modal('hide');
                    bootbox.alert(data);
                    loadSelectionsCategory();
                    loadCategory(1);
                }
            },
            error: function (data) {
                document.getElementById('edit_category_status').innerHTML = "";
                document.getElementById('edit_status').style = 'display:block';
                errors = data.responseJSON.errors;
                $.each(errors, function (key, value) {
                    $('#edit_category_status').append(`<tr><td style="color:red;">- ${value}</td></tr>`)
                })
            }
        })
}

function uploadImage1(element) {
    var img = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function () {
        $("#Image1").attr("src", reader.result);
    }
    reader.readAsDataURL(img);
}

function uploadImage2(element) {
    var img = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function () {
        $("#Image2").attr("src", reader.result);
    }
    reader.readAsDataURL(img);
}

function uploadImage3(element) {
    var img = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function () {
        $("#Image3").attr("src", reader.result);
    }
    reader.readAsDataURL(img);
}


function loadCategory(id) {
    $.ajax({
        url: `/api/category/${id}`,
        method: "GET",
        dataType: "json",
        success: function (data) {
            document.getElementById('category_content').innerHTML = "";
            $('#category_content').append(
                `
                <tr>
                <td>Giá phòng</td>
                <td>
                    <label class="mr-2">Theo giờ : </label><span>${data[0].price_hour}đ</span>
                    <br>
                    <label class="mr-2">Theo ngày : </label><span>${data[0].price_day}đ</span>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td>
                    <img src="/storage/${data[0].image1}" style="width:30%; height: auto;"
                        alt="" class="mr-2">
                    <img src="/storage/${data[0].image2}" style="width:30%; height: auto;"
                        alt="" class="mr-2">
                    <img src="/storage/${data[0].image3}" style="width:30%; height: auto;"
                        alt="">
                </td>
            </tr>
            <tr>
                <td>Mô tả 1</td>
                <td style="width:100%; height: auto;">${data[0].description1}</td>
            </tr>
            <tr>
                <td>Mô tả 2</td>
                <td style="width:100%; height: auto;">${data[0].description2}</td>
            </tr>
            <tr>
                <td>Mô tả 3</td>
                <td style="width:100%; height: auto;">${data[0].description3}</td>
            </tr>
                `
            );
            $("#name_edit").val(data[0].name);
            $("#price_hour_edit").val(data[0].price_hour);
            $("#price_day_edit").val(data[0].price_day);
            $("#description1_edit").val(data[0].description1);
            $("#description2_edit").val(data[0].description2);
            $("#description3_edit").val(data[0].description3);
            var img1 = "/storage/" + data[0].image1;
            $("#editImage1").attr("src", img1);
            var img2 = "/storage/" + data[0].image2;
            $("#editImage2").attr("src", img2);
            var img3 = "/storage/" + data[0].image3;
            $("#editImage3").attr("src", img3);
            var action = `
            <a href="javascript:;" class="btn btn-success"
                            style="color:white; background-color: #003300 !important;" onclick="update_category(${data[0].id})">Cập nhật</a>
                        <button type="button" class="btn btn-danger"
                            style="color:white; background-color: #990000 !important;" data-dismiss="modal">Hủy</button>
            `;
            document.getElementById('edit_footer').innerHTML = action;

        }
    });
}

function showModalAdd() {
    $("#addCategory").modal('show');
}

function showModalEdit() {
    document.getElementById('edit_category_status').innerHTML = "";
    $("#editCategory").modal('show');
}

function deleteCategory() {
    id = document.getElementById('select_category').value;
    bootbox.confirm({
        title: "Xóa loại phòng",
        message: "Bạn có muốn xóa loại phòng này khỏi danh sách?",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> No'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Yes'
            }
        },
        callback: function (result) {
            if (result) {
                $.ajax({
                    url: `/api/category/${id}`,
                    method: "DELETE",
                    dataType: "json",
                    success: function (data) {
                        bootbox.alert(data);
                        loadSelectionsCategory();
                        loadCategory(1);
                    }
                })
            }
        }
    });
}


function loadSelectionsCategory() {
    $.ajax({
        url: "/api/category",
        method: "GET",
        dataType: "json",
        success: function (data) {
            document.getElementById('select_category').innerHTML = "";
            $.each(data, function (key, value) {
                $('#select_category').append(
                    `<option value="${value.id}">${value.name}</option>`
                )
            });
        }
    });
};

$(document).ready(function () {
    loadSelectionsCategory();
    loadCategory(1);
});
