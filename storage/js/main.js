var url = window.location.pathname;
var filename = url.substring(url.lastIndexOf('/') + 1);

var folderList;

$.ajax
({
    dataType: "json",
    url: "config/folder.json",
    async: false,
    success: function (data) {
        folderList = data.folders;
    }
});

function urlParam(name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    return results == null ? null : results[1];
}

$(document).ready(function () {
    var checkGalleryExist = setInterval(function () {
        if ($('.gallery_filter').length) {
            clearInterval(checkGalleryExist);
            $.each(folderList, function (index) {
                $('.gallery_filter').append("<li data-filter='." + folderList[index] + "'><a href=\"#\">" + folderList[index].toUpperCase() + "</a></li>");
            });

            var max = urlParam('max');

            $.each([10, 20, 50, 100, 200, 500], function (x, y) {
                if (max != null && max == y) {
                    $('#select-max').append('<option selected value="' + y + '">' + y + '</option>');
                } else {
                    $('#select-max').append('<option value="' + y + '">' + y + '</option>');
                }
            });

            var yearNow = new Date().getFullYear();


            var yearMin = urlParam('yearMin');
            var yearMax = urlParam('yearMax');

            if (yearMin == null) {
                yearMin = 1900;
            }

            if (yearMax == null) {
                yearMin = yearNow;
            }

            $("#slider-range").slider({
                range: true,
                min: 1900,
                max: yearNow,
                values: [yearMin, yearMax],
                slide: function (event, ui) {
                    $("#year").val(ui.values[0] + ' - ' + ui.values[1]);
                },
                change: function (event, ui) {
                    var url = new URL(window.location.href);

                    var query_string = url.search;

                    var search_params = new URLSearchParams(query_string);

                    search_params.delete('yearMax');
                    search_params.delete('yearMin');

                    search_params.append('yearMin', ui.values[0]);
                    search_params.append('yearMax', ui.values[1]);

                    url.search = search_params.toString();

                    window.location.href = url.toString();
                }
            });
            $("#year").val($("#slider-range").slider("values", 0) +
                " - " + $("#slider-range").slider("values", 1));

            $('#select-max').on('change', function () {
                var url = new URL(window.location.href);

                var query_string = url.search;

                var search_params = new URLSearchParams(query_string);

                search_params.delete('max');

                if ($(this).val() !== '') {
                    search_params.append('max', $(this).val());
                }
                url.search = search_params.toString();

                window.location.href = url.toString();
            });
        }
    }, 100); // check every 100ms
    if (filename.indexOf('gallery') >= 0) {
        filename = "gallery.html";
    } else if (filename.indexOf('about-us') >= 0) {
        var checkExist = setInterval(function () {
            if ($('.banner_content .theme_btn').length) {
                clearInterval(checkExist);
                $('.banner_content .theme_btn').remove();
            }
        }, 100); // check every 100ms
    }
    $('.menu_nav li a[href$="' + filename + '"]').parent().addClass("active");
});