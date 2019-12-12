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

$(document).ready(function () {
    var checkGalleryExist = setInterval(function () {
        if ($('.gallery_filter').length) {
            $.each(folderList, function (index) {
                $('.gallery_filter').append("<li data-filter='." + folderList[index] + "'><a href=\"#\">" + folderList[index].toUpperCase() + "</a></li>");
            });
            clearInterval(checkGalleryExist);
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