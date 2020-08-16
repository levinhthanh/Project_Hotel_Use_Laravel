$(document).ready(function () {
    loadBooking();
});

function finishReceive(id){
    var user_email = $('#user_email').val();
    var formData = new FormData;
    formData.append('id', id);
    formData.append('user_email', user_email);
    $.ajax({
        url: '/api/receive/update_receive',
        method: 'POST',
        dataType: 'json',
        contentType: false,
        processData: false,
        data: formData,
        success: function (data) {
            alert(data);
            console.log(data);
            loadBooking()
            $("#receive_info").modal('hide');
        },
    });
}

function openModal() {
    $("#receive_info").modal('show');
}

function hideModal() {
    $("#receive_info").modal('hide');
}

function getInfo(id) {
    openModal();
    $.ajax({
        url: `/api/booking/${id}`,
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#customer_name').html(data.name);
            $('#customer_phone').html(data.phone);
            $('#customer_email').html(data.email);
            $('#customer_in').html(data.checkIn);
            $('#customer_out').html(data.checkOut);
            $('#customer_room').html(data.room_name);
            if (data.payment == 'money') {
                data.payment = 'Tại quầy';
            }
            if (data.payment == 'banking') {
                data.payment = 'Chuyển khoản';
            }
            if (data.payment == 'wallet') {
                data.payment = 'Ví điện tử';
            }
            $('#customer_payment').html(data.payment);
            $('#customer_status').html(data.bookStatus);

            $('#receive_confirm').html(`
            <button class="btn btn-success mr-2" onclick="finishReceive(${data.id})">Nhận phòng</button>
            <button class="btn btn-danger" onclick="hideModal()">Tắt</button>
            `);
        }
    });
}

function loadBooking() {
    $.ajax({
        url: "/api/receive",
        method: "GET",
        dataType: "json",
        success: function (data) {
            if (data != "") {
                $('#table_booking tbody').html("");
                $.each(data, function (key, value) {
                    $('#table_booking tbody').append(
                        `   <tr>
                           <td>${value.id}</td>
                           <td>${value.name}</td>
                           <td>${value.phone}</td>
                           <td><button class="btn btn-success" onclick="getInfo(${value.id})">Xem</button></td>
                           </tr>
                           `
                    );
                });
            }
        }
    });
};
