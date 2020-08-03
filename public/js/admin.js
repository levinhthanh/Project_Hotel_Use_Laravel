
$(document).ready(function () {

    $('#employees').DataTable({});
    $("#list-header").on({
        mouseenter: function () {
            $(this).css("background-color", "lightgray");
        },
        mouseleave: function () {
            $(this).css("background-color", "lightblue");
        },
    });
    $("#btnReloadData").on("click", function () {
        table.ajax.reload();
    });

});

function show_edit(){
    $('#dialog1').modal('show');
}
function show_delete(){
    $('#dialog2').modal('show');
}




