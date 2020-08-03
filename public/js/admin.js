
        var table;
        var urlUsers = "https://jsonplaceholder.typicode.com/users";

        function initTableData() {
            $.ajax({
                    url: '/admin/get_employee',
                    type: 'get',
                    dataType: 'array',
                }).done(function(responseData) {
                     console.log(responseData);
                        });

                    }

                    $(document).ready(function() {
                        initTableData();
                        $("#list-header").on({
                            mouseenter: function() {
                                $(this).css("background-color", "lightgray");
                            },
                            mouseleave: function() {
                                $(this).css("background-color", "lightblue");
                            },
                        });
                        $("#btnReloadData").on("click", function() {
                            table.ajax.reload();
                        });
                    });

