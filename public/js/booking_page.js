$(document).ready(function () {
    $("#step1_icon").attr("style", 'color:darkorange ; font-size: 2vw');
    $("#step2_icon").attr("style", 'color:darkgray ; font-size: 2vw');
    $("#step3_icon").attr("style", 'color:darkgray ; font-size: 2vw');
    $("#step4_icon").attr("style", 'color:darkgray ; font-size: 2vw');

});


function checkDayIn(dayIn) {
    var x = new Date(dayIn);

    var dateObj = new Date();
    var month = dateObj.getUTCMonth() + 1;
    var day = dateObj.getUTCDate();
    var year = dateObj.getUTCFullYear();
    newdate = year + "-" + month + "-" + day;
    var y = new Date(newdate);

    if(x < y) {
        alert('Ngày đã qua, quý khách vui lòng chọn lại!');
        $("#dayIn").val("");
    }
}

function checkDayOut(dayOut) {
    var x = new Date(dayOut);

    var dateObj = new Date();
    var month = dateObj.getUTCMonth() + 1;
    var day = dateObj.getUTCDate();
    var year = dateObj.getUTCFullYear();
    newdate = year + "-" + month + "-" + day;
    var y = new Date(newdate);

    if(x < y) {
        alert('Ngày đã qua, quý khách vui lòng chọn lại!');
        $("#dayOut").val("");
    }
    else{
        var dayIn = $("#dayIn").val();
        if(dayIn == ""){
            alert('Qúy khách vui lòng chọn ngày đến !');
            $("#dayOut").val("");
        }else{
            var z = new Date(dayIn);
            if(x < z){
                 alert('Qúy khách cần chọn ngày đi sau ngày đến !');
                 $("#dayOut").val("");
            }
        }


    }
}


