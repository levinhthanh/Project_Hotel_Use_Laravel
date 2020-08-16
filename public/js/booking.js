

function nonConfirm(id) {
    update_booking(id, 'Chưa xác nhận');
}
function finishBook(id) {
    update_booking(id, 'Hoàn tất');
}
function cancelBook(id) {
    update_booking(id, 'Hủy đơn');
}

function update_booking(id, status) {
    var user_email = $('#user_email').val();
    var rooms_name = $('#customer_room').html();
    var formData = new FormData;
    formData.append('id', id);
    formData.append('status', status);
    formData.append('user_email', user_email);
    formData.append('rooms_name', rooms_name);
    $.ajax({
        url: '/api/booking/update_booking',
        method: 'POST',
        dataType: 'json',
        contentType: false,
        processData: false,
        data: formData,
        success: function (data) {
            alert(data);
            console.log(data);
            loadBooking()
            $("#booking_info").modal('hide');
        },
    });
}

function openModal() {
    $("#booking_info").modal('show');
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

            $('#booking_confirm').html(`
            <button class="btn btn-warning mr-2" onclick="nonConfirm(${data.id})">Khách chưa xác nhận</button>
            <button class="btn btn-success mr-2" onclick="finishBook(${data.id})">Hoàn tất đặt phòng</button>
            <button class="btn btn-danger" onclick="cancelBook(${data.id})">Hủy bỏ đặt phòng</button>
            `);
        }
    });
}

function loadBooking() {
    $.ajax({
        url: "/api/booking",
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

$(document).ready(function () {
    loadBooking();
});
