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
                        <td><img src="/${value.image}" style="width:60px; height: 70px;"></td>
                        <td>${value.name}</td>
                        <td>${value.birthday}</td>
                        <td>${value.gender}</td>
                        <td>${value.address}</td>
                        <td>${value.phone}</td>
                        <td>${value.possition}</td>
                        <td>${value.salary}</td>
                        <td>${value.email}</td>
                        <td>${value.deleted}</td>
                        <td>
                            <a href="javascript:;" class="btn" style="color:#696969; background-color: #FFFF00 !important;"
                                    onclick="employee.get(${value.id})">Sửa</a>
                            <a href="javascript:;" class="btn mt-1" style="color:white; background-color: #990000 !important;"
                                    onclick="employee.delete(${value.id})">Xóa</a>
                        </td>
                    </tr>`
                )
            })
        }
    });
};

employee.openModal = function () {
    employee.reset();
    $("#addEditEmployee").modal('show');
}

employee.save = function () {
    if ($("#formAddEditEmployee").valid()) {
        //create
        if ($("#EmployeeId").val() == 0) {

            var createObj = {};
            createObj.name = $("#name").val();
            createObj.birthday = $("#birthday").val();
            createObj.gender = $("#gender").val();
            createObj.address = $("#address").val();
            createObj.email = $("#email").val();
            createObj.password = $("#password").val();
            createObj.phone = $("#phone").val();
            createObj.possition = $("#possition").val();
            createObj.salary = $("#salary").val();
            createObj.image = $("#image").prop("files")[0];

            $.ajax({
                url: "/api/employee",
                method: "POST",
                dataType: "json",
                contentType: "application/json",
                data: JSON.stringify(createObj),
                success: function (data) {
                    document.getElementById('table_status').innerHTML = "";
                    document.getElementById('create_status').style = 'display:block';
                    if (data == 'Email đã tồn tại!') {
                        $('#table_status').append(`<tr><td style="color:red;">- ${data}</td></tr>`);
                    } else {
                        // $('#table_status').append(`<tr><td style="color:green;">- ${data}</td></tr>`);
                        $("#addEditEmployee").modal('hide');
                        bootbox.alert(data);
                        employee.showEmployees();
                    }




                },
                error: function (data) {
                    document.getElementById('table_status').innerHTML = "";
                    document.getElementById('create_status').style = 'display:block';
                    errors = data.responseJSON.errors;
                    console.log(data.responseJSON.errors);
                    $.each(errors, function (key, value) {
                        $('#table_status').append(`<tr><td style="color:red;">- ${value}</td></tr>`)
                    })
                }
            })
        }
        //update
        // else{
        //     var updateObj = {};
        //     updateObj.id = $("#EmployeeId").val();
        //     updateObj.fullName = $("#Fullname").val();
        //     updateObj.gender = $("#Gender").val();
        //     updateObj.dob = $("#DoB").val();
        //     updateObj.address = $("#Address").val();
        //     updateObj.avatar = $("#Avatar").attr("src");

        //     $.ajax({
        //         url:`http://localhost:3000/employees/${updateObj.id}`,
        //         method: "PUT",
        //         dataType:"json",
        //         contentType:"application/json",
        //         data : JSON.stringify(updateObj),
        //         success : function(){
        //             $("#addEditEmployee").modal('hide');
        //             bootbox.alert("Employee has been updated success!");
        //             employee.showEmployees();
        //         }
        //     })
        // }

    }
}

employee.reset = function () {
    $("#Fullname").val("");
    $("#Gender").val("");
    $("#DoB").val("");
    $("#Address").val("");
    $("#addEditEmployee").find(".modal-title").text("Thêm mới nhân viên");
    $("#addEditEmployee").find(".btn-success").text("Thêm");
}

// employee.get = function(id){
//     $.ajax({
//         url:`http://localhost:3000/employees/${id}`,
//         method:"GET",
//         dataType:"json",
//         success : function(data){
//             if(data != null){
//                 $("#Fullname").val(data.fullName);
//                 $("#Gender").val(data.gender);
//                 $("#DoB").val(data.dob);
//                 $("#Address").val(data.address);
//                 $("#EmployeeId").val(data.id);
//                 var avatar = (data.avatar != null && data.avatar != "") ? data.avatar : "images/nonavatar.png";
//                 $("#Avatar").attr("src", avatar);

//                 $("#addEditEmployee").find(".modal-title").text("Edit employee");
//                 $("#addEditEmployee").find(".btn-success").text("Update");
//                 $("#addEditEmployee").modal('show');
//             }
//         }
//     });
// }

// employee.delete = function(id){
//     bootbox.confirm({
//         title: "Remove employee?",
//         message: "Do you want to remove employee now? This cannot be undone.",
//         buttons: {
//             cancel: {
//                 label: '<i class="fa fa-times"></i> No'
//             },
//             confirm: {
//                 label: '<i class="fa fa-check"></i> Yes'
//             }
//         },
//         callback: function (result) {
//             if(result){
//                 $.ajax({
//                     url:`http://localhost:3000/employees/${id}`,
//                     method: "DELETE",
//                     dataType:"json",
//                     success : function(){
//                         bootbox.alert("Employee has been removed success!");
//                         employee.showEmployees();
//                     }
//                 })
//             }
//         }
//     });
// }

employee.uploadAvatar = function (element) {
    var img = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function () {
        $("#Avatar").attr("src", reader.result);
    }
    reader.readAsDataURL(img);
}
employee.init = function () {
    employee.showEmployees();
};

$(document).ready(function () {
    employee.init();
});
