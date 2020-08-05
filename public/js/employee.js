var employee = employee || {};

employee.showEmployees = function(){
    $.ajax({
        url:"/api/employee",
        method:"GET",
        dataType:"json",
        success : function(data){
            $('#tbEmployee tbody').empty();
            $.each(data, function(i, v){
                // var avatar = (v.avatar != null && v.avatar != "") ? v.avatar : "images/nonavatar.png";
                $('#tbEmployee tbody').append(
                    `<tr>
                        <td>${v.id}</td>
                        <td><img src="public/storage/${v.image}" style="width:60px; height: 70px;"></td>
                        <td>${v.name}</td>
                        <td>${v.birthday}</td>
                        <td>${v.gender}</td>
                        <td>${v.address}</td>
                        <td>${v.phone}</td>
                        <td>${v.possition}</td>
                        <td>${v.salary}</td>
                        <td>${v.email}</td>
                        <td>${v.deleted}</td>
                        <td>
                            <a href="javascript:;" class="btn btn-primary"
                                    onclick="employee.get(${v.id})">Sửa</a>
                            <a href="javascript:;" class="btn btn-danger"
                                    onclick="employee.delete(${v.id})">Xóa</a>
                        </td>
                    </tr>`
                )
            })
console.log(data);
        }
    });
};

employee.openModal = function(){
    employee.reset();
    $("#addEditEmployee").modal('show');
}

// employee.save = function(){
//     if($("#frmAddEditEmployee").valid()){
//         //create
//         if($("#EmployeeId").val() == 0){
//             var createObj = {};
//             createObj.fullName = $("#Fullname").val();
//             createObj.gender = $("#Gender").val();
//             createObj.dob = $("#DoB").val();
//             createObj.address = $("#Address").val();
//             createObj.avatar = $("#Avatar").attr("src");

//             $.ajax({
//                 url:"http://localhost:3000/employees",
//                 method: "POST",
//                 dataType:"json",
//                 contentType:"application/json",
//                 data : JSON.stringify(createObj),
//                 success : function(){
//                     $("#addEditEmployee").modal('hide');
//                     bootbox.alert("Employee has been created success!");
//                     employee.showEmployees();
//                 }
//             })
//         }
//         //update
//         else{
//             var updateObj = {};
//             updateObj.id = $("#EmployeeId").val();
//             updateObj.fullName = $("#Fullname").val();
//             updateObj.gender = $("#Gender").val();
//             updateObj.dob = $("#DoB").val();
//             updateObj.address = $("#Address").val();
//             updateObj.avatar = $("#Avatar").attr("src");

//             $.ajax({
//                 url:`http://localhost:3000/employees/${updateObj.id}`,
//                 method: "PUT",
//                 dataType:"json",
//                 contentType:"application/json",
//                 data : JSON.stringify(updateObj),
//                 success : function(){
//                     $("#addEditEmployee").modal('hide');
//                     bootbox.alert("Employee has been updated success!");
//                     employee.showEmployees();
//                 }
//             })
//         }

//     }
// }

employee.reset = function(){
    $("#Fullname").val("");
    $("#Gender").val("");
    $("#DoB").val("");
    $("#Address").val("");
    $("#addEditEmployee").find(".modal-title").text("Create new employee");
    $("#addEditEmployee").find(".btn-success").text("Save");
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

// employee.uploadAvatar = function(element){
//     var img = element.files[0];
//     var reader = new FileReader();
//     reader.onloadend = function() {
//       $("#Avatar").attr("src",reader.result);
//     }
//     reader.readAsDataURL(img);
// }
employee.init = function(){
    employee.showEmployees();
};

$(document).ready(function(){
    employee.init();
});
