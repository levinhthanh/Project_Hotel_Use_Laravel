$(document).ready(function () {
    getAccount();
});

function getAccount(){
    pay = $("#selectPayment").val();
    if (pay == "money") {
        $('#paymentContent').html('Nhân viên khách sạn sẽ sớm liên hệ với quý khách. Vui lòng nhận máy!');
    }
    if (pay == "banking") {
        $('#paymentContent').html('Số tài khoản ngân hàng: VCB 324588976543678');
    }
    if (pay == "wallet") {
        $('#paymentContent').html('Momo: 0.999.999.999');
    }
}
