var employee = employee || {};

employee.showEmployees = function () {
    $.ajax({
        url: "/api/employee",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#tbEmployee tbody').empty();
                $.each(data, function (key, value) {
                    $('#tbEmployee tbody').append(
                        `<tr>
                            <td>${value.id}</td>
                            <td><img src="/storage/${value.image}" style="width:60px; height: 70px;"></td>
                            <td>${value.name}</td>
                            <td>${value.birthday}</td>
                            <td>${value.gender}</td>
                            <td>${value.address}</td>
                            <td>${value.phone}</td>
                            <td>${value.possition}</td>
                            <td>${value.salary}</td>
                            <td>${value.email}</td>
                            <td>
                                <a href="javascript:;" class="btn" style="color:#696969; background-color: #FFFF00 !important;"
                                        onclick="employee.get(${value.id})">Sửa</a>
                                <a href="javascript:;" class="btn mt-1" style="color:white; background-color: #990000 !important;"
                                        onclick="employee.delete(${value.id})">Xóa</a>
                            </td>
                        </tr>`
                    )
                });
                $('#tbEmployee').DataTable();

        }
    });
};

employee.openModalAdd = function () {
    employee.reset();
    $("#addEmployee").modal('show');
}

employee.save = function () {
    if ($("#formAddEmployee").valid()) {
            var formData = new FormData($("#formAddEmployee")[0]);
            formData.append('name', $("#name").val());
            formData.append('birthday', $("#birthday").val());
            formData.append('gender', $("#gender").val());
            formData.append('address', $("#address").val());
            formData.append('email', $("#email").val());
            formData.append('password', $("#password").val());
            formData.append('phone', $("#phone").val());
            formData.append('possition', $("#possition").val());
            formData.append('salary', $("#salary").val());
            formData.append('image', $('#image')[0].files[0]);

            $.ajax({
                url: "/api/employee",
                method: 'POST',
                dataType: 'json',
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    document.getElementById('table_status').innerHTML = "";
                    document.getElementById('create_status').style = 'display:block';
                    if (data == 'Email đã tồn tại!') {
                        $('#table_status').append(`<tr><td style="color:red;">- ${data}</td></tr>`);
                    } else {
                        $("#addEmployee").modal('hide');
                        bootbox.alert(data);
                        employee.showEmployees();
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

employee.update = function () {
    if ($("#formEditEmployee").valid()) {
            var formData = new FormData($("#formEditEmployee")[0]);
            formData.append('id', $("#editEmployeeId").val());
            formData.append('address', $("#addressEdit").val());
            formData.append('phone', $("#phoneEdit").val());
            formData.append('possition', $("#possitionEdit").val());
            formData.append('salary', $("#salaryEdit").val());
            formData.append('image', $('#imageEdit')[0].files[0]);

            $.ajax({
                url:'/api/employee/update',
                method: 'POST',
                dataType: 'json',
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    console.log(data);
                        $("#editEmployee").modal('hide');
                        bootbox.alert(data);
                        employee.showEmployees();
                },
                error: function (data) {
                    console.log(data);
                    document.getElementById('table_status_update').innerHTML = "";
                    document.getElementById('update_status').style = 'display:block';
                    errors = data.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        $('#table_status_update').append(`<tr><td style="color:red;">- ${value}</td></tr>`)
                    })
                }
            })
        }

    }


employee.reset = function () {
    $("#name").val("");
    $("#birthday").val("");
    $("#gender").val("");
    $("#address").val("");
    $("#email").val("");
    $("#password").val("");
    $("#phone").val("");
    $("#possition").val("");
    $("#salary").val("");
    $("#image").val("");
}

employee.get = function(id){
    $.ajax({
        url:`/api/employee/${id}`,
        method:"GET",
        dataType:"json",
        success : function(data){
            if(data != null){
                $("#editEmployeeId").val(data.id);
                $("#addressEdit").val(data.address);
                $("#phoneEdit").val(data.phone);
                $("#possitionEdit").val(data.possition);
                $("#salaryEdit").val(data.salary);
                var avatar = (data.image != null && data.image != "") ? "/storage/"+data.image : "images/nonavatar.png";
                $("#editAvatar").attr("src", avatar);
                document.getElementById('table_status_update').innerHTML = "";
                $("#editEmployee").modal('show');
            }
        },
        error: function (data) {
            alert('Lỗi');
        }
    });
}

employee.delete = function(id){
    bootbox.confirm({
        title: "Xóa nhân viên",
        message: "Bạn có muốn xóa nhân viên này khỏi danh sách?",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> No'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Yes'
            }
        },
        callback: function (result) {
            if(result){
                $.ajax({
                    url:`/api/employee/${id}`,
                    method: "DELETE",
                    dataType:"json",
                    success : function(data){
                        bootbox.alert(data);
                        employee.showEmployees();
                    }
                })
            }
        }
    });
}

employee.uploadAvatar = function (element) {
    var img = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function () {
        $("#Avatar").attr("src", reader.result);
    }
    reader.readAsDataURL(img);
}

employee.uploadAvatarEdit = function (element) {
    var img = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function () {
        $("#editAvatar").attr("src", reader.result);
    }
    reader.readAsDataURL(img);
}

employee.init = function () {
    employee.showEmployees();
};

$(document).ready(function () {
    employee.init();
});
