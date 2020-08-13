function loadRoom(id) {
    $.ajax({
        url: `/api/room/${id}`,
        method: "GET",
        dataType: "json",
        success: function (data) {
            $("#nameEdit").val(data[0].name);
            $("#categoryEdit").val(data[0].category.id);
            $("#Image1Edit").attr("src", "/storage/default_image.jpg");
            $("#image1Edit").val("");
            $("#Image2Edit").attr("src", "/storage/default_image.jpg");
            $("#image2Edit").val("");
            $("#Image3Edit").attr("src", "/storage/default_image.jpg");
            $("#image3Edit").val("");
            var action = `
            <a href="javascript:;" class="btn btn-success"
                 style="color:white; background-color: #003300 !important;" onclick="update_room(${data[0].id})">Cập nhật</a>
            <button type="button" class="btn btn-danger" style="color:white; background-color: #990000 !important;"
                 data-dismiss="modal">Hủy</button> `;
            document.getElementById('footer_edit_room').innerHTML = action;
        }
    });
}

function update_room(id) {
    var formData = new FormData($("#formEditRoom")[0]);
    formData.append('id', id);
    formData.append('name', $("#nameEdit").val());
    formData.append('category_id', $("#categoryEdit").val());
    formData.append('status', $("#status").val());
    if ($('#image1Edit')[0].files[0] != "") {
        formData.append('image1', $('#image1Edit')[0].files[0]);
    }
    if ($('#image2Edit')[0].files[0] != "") {
        formData.append('image2', $('#image2Edit')[0].files[0]);
    }
    if ($('#image3Edit')[0].files[0] != "") {
        formData.append('image3', $('#image3Edit')[0].files[0]);
    }

    $.ajax({
        url: '/api/room/update',
        method: 'POST',
        dataType: 'json',
        contentType: false,
        processData: false,
        data: formData,
        success: function (data) {
            if (data == 'Tên phòng đã tồn tại') {
                document.getElementById('table_edit_status').innerHTML = "";
                document.getElementById('edit_status').style = 'display:block';
                $('#table_edit_status').append(`<tr><td style="color:red;">- ${data}</td></tr>`)
            } else {
                $("#editRoom").modal('hide');
                bootbox.alert(data);
                get_rooms();
                document.getElementById('edit_status').style = 'display:none';
            }
        },
        error: function (data) {
            document.getElementById('table_edit_status').innerHTML = "";
            document.getElementById('edit_status').style = 'display:block';
            errors = data.responseJSON.errors;
            $.each(errors, function (key, value) {
                $('#table_edit_status').append(`<tr><td style="color:red;">- ${value}</td></tr>`)
            })
        }
    })
}

function openModalEdit(id) {
    loadSelectionsCategoryEdit();
    loadRoom(id);
    document.getElementById('table_edit_status').innerHTML = "";
    $("#editRoom").modal('show');
}

function deleteRoom(id){
    bootbox.confirm({
        title: "Xóa phòng",
        message: "Bạn có muốn xóa phòng này khỏi danh sách?",
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
                    url: `/api/room/${id}`,
                    method: "DELETE",
                    dataType: "json",
                    success: function (data) {
                        bootbox.alert(data);
                        get_rooms();
                    }
                })
            }
        }
    });
}

function add_room() {
    if ($("#formAddRoom").valid()) {
        var formData = new FormData($("#formAddRoom")[0]);
        formData.append('name', $("#name").val());
        formData.append('category', $("#category").val());
        formData.append('image1', $('#image1')[0].files[0]);
        formData.append('image2', $('#image2')[0].files[0]);
        formData.append('image3', $('#image3')[0].files[0]);

        $.ajax({
            url: "/api/room",
            method: 'POST',
            dataType: 'json',
            contentType: false,
            processData: false,
            data: formData,
            success: function (data) {
                if (data == 'Phòng đã tồn tại') {
                    document.getElementById('table_status').innerHTML = "";
                    document.getElementById('create_status').style = 'display:block';
                    $('#table_status').append(`<tr><td style="color:red;">- ${data}</td></tr>`)
                }
                else {
                    $("#addRoom").modal('hide');
                    bootbox.alert(data);
                    get_rooms();
                    $("#name").val("");
                    $("#Image1").attr("src", "/storage/default_image.jpg");
                    $("#image1").val("");
                    $("#Image2").attr("src", "/storage/default_image.jpg");
                    $("#image2").val("");
                    $("#Image3").attr("src", "/storage/default_image.jpg");
                    $("#image3").val("");
                    document.getElementById('create_status').style = 'display:none';
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

function get_rooms() {
    $.ajax({
        url: "/api/room",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#table_room tbody').empty();
            $.each(data, function (key, value) {
                $('#table_room tbody').append(
                    `<tr>
                            <td>${value.id}</td>
                            <td>${value.name}</td>
                            <td>${value.category.name}</td>
                            <td><img src="/storage/${value.image1}" style="width:70px; height: auto;"></td>
                            <td><img src="/storage/${value.image2}" style="width:70px; height: auto;"></td>
                            <td><img src="/storage/${value.image3}" style="width:70px; height: auto;"></td>
                            <td>${value.using}</td>
                            <td>
                                <a href="javascript:;" class="btn" style="color:#696969; background-color: #FFFF00 !important;"
                                        onclick="openModalEdit(${value.id})">Sửa</a>
                                <a href="javascript:;" class="btn mt-1" style="color:white; background-color: #990000 !important;"
                                        onclick="deleteRoom(${value.id})">Xóa</a>
                            </td>
                        </tr>`
                )
            });
            $('#table_room').DataTable();

        }
    });
}

function loadSelectionsCategory() {
    $.ajax({
        url: "/api/category",
        method: "GET",
        dataType: "json",
        success: function (data) {
            document.getElementById('category').innerHTML = "";
            $.each(data, function (key, value) {
                $('#category').append(
                    `<option value="${value.id}">${value.name}</option>`
                )
            });
        }
    });
};

function loadSelectionsCategoryEdit() {
    $.ajax({
        url: "/api/category",
        method: "GET",
        dataType: "json",
        success: function (data) {
            document.getElementById('categoryEdit').innerHTML = "";
            $.each(data, function (key, value) {
                $('#categoryEdit').append(
                    `<option value="${value.id}">${value.name}</option>`
                )
            });
        }
    });
};

function uploadImage1(element, action) {
    var img = element.files[0];
    var reader = new FileReader();
    if(action == 'create'){
        reader.onloadend = function () {
            $("#Image1").attr("src", reader.result);
        }
    }
    if(action == 'edit'){
        reader.onloadend = function () {
            $("#Image1Edit").attr("src", reader.result);
        }
    }
    reader.readAsDataURL(img);
}

function uploadImage2(element, action) {
    var img = element.files[0];
    var reader = new FileReader();
    if(action == 'create'){
        reader.onloadend = function () {
            $("#Image2").attr("src", reader.result);
        }
    }
    if(action == 'edit'){
        reader.onloadend = function () {
            $("#Image2Edit").attr("src", reader.result);
        }
    }
    reader.readAsDataURL(img);
}

function uploadImage3(element, action) {
    var img = element.files[0];
    var reader = new FileReader();
    if(action == 'create'){
        reader.onloadend = function () {
            $("#Image3").attr("src", reader.result);
        }
    }
    if(action == 'edit'){
        reader.onloadend = function () {
            $("#Image3Edit").attr("src", reader.result);
        }
    }
    reader.readAsDataURL(img);
}

function openModalAdd() {
    $("#name").val("");
    $("#Image1").attr("src", "/storage/default_image.jpg");
    $("#image1").val("");
    $("#Image2").attr("src", "/storage/default_image.jpg");
    $("#image2").val("");
    $("#Image3").attr("src", "/storage/default_image.jpg");
    $("#image3").val("");
    $("#addRoom").modal('show');
}

$(document).ready(function () {
    get_rooms();
    loadSelectionsCategory();
});
