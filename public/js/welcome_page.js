
function load_categories() {
    $.ajax({
        url: "/api/category",
        method: "GET",
        dataType: "json",
        success: function (data) {
            document.getElementById('categories_list').innerHTML = "";
            i = 1;
            $.each(data, function (key, value) {
                if (i < 4) {
                    $('#categories_list').append(`
                                  <div class="category">
                                      <img class="category_image" src="{{ asset('./storage/${value.image1}') }}" alt="image">
                                      <div class="container html_a_cover">
                                          <a class="html_a" href="/category/${value.id}">${value.name}</a>
                                      </div>
                                      <div class="container html_p_cover">
                                          <p class="html_p">${value.description1}</p>
                                          <a href="/category/${value.id}" class="btn html_button">CHI TIẾT</a>
                                      </div>
                                  </div>
                            `);
                }
                i++;
            });
        }
    });
}


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


$(document).ready(function () {
    load_categories();
});

