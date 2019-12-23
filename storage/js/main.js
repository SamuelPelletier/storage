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

            var year = urlParam('year');
            var max = urlParam('max');

            for (var i = 1900; i < 2099; i++) {
                if (year != null && year == i) {
                    $('#select-year').append('<option selected value="' + i + '">' + i + '</option>');
                } else {
                    $('#select-year').append('<option value="' + i + '">' + i + '</option>');
                }

            }

            $.each([10, 20, 50, 100, 200, 500], function (x, y) {
                if (max != null && max == y) {
                    $('#select-max').append('<option selected value="' + y + '">' + y + '</option>');
                } else {
                    $('#select-max').append('<option value="' + y + '">' + y + '</option>');
                }
            });

            $('#select-year').on('change', function () {
                var url = new URL(window.location.href);

                var query_string = url.search;

                var search_params = new URLSearchParams(query_string);

                search_params.delete('year');

                search_params.append('year', $(this).val());

                url.search = search_params.toString();

                window.location.href = url.toString();
            });

            $('#select-max').on('change', function () {
                var url = new URL(window.location.href);

                var query_string = url.search;

                var search_params = new URLSearchParams(query_string);

                search_params.delete('max');

                search_params.append('max', $(this).val());

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