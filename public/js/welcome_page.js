
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
                                      <img class="category_image" src="/storage/${value.image1}" alt="image">
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





$(document).ready(function () {
    load_categories();
});

