$(document).ready(function () {
    $("#watch_trailer").click(function (e) {
        e.prevenDefault();
        var aid = $(this).attr("href");
        $("html, body").animate(
            {
                scrollTop: $(aid).offset().top,
            },
            "slow"
        );
    });

    $("#timkiem").keyup(function () {
        $("#result").html("");
        var search = $("#timkiem").val();
        if (search != "") {
            var expression = new RegExp(search, "i");
            $.getJSON("./json_file/movies.json", function (data) {
                $.each(data, function (key, value) {
                    if (value.title.search(expression) != -1) {
                        $("#result").append(
                            '<li style="cursor:pointer; display: flex; max-height: 200px;" class="list-group-item link-class"><img src="uploads/movie/' +
                                value.image +
                                '" width="70" /><div style="flex-direction: column; margin-left: 12px;"><h4 width="100%">' +
                                value.title +
                                '</h4><span class="text-muted">| ' +
                                value.description +
                                "</span></div></li>"
                        );
                    }
                });
            });
        }
    });

    $("#result").on("click", "li", function () {
        var click_text = $(this).text().split("|");
        $("#timkiem").val($.trim(click_text[0]));
        $("#result").html("");
    });
});
