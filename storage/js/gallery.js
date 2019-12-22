function urlParam(name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    return results == null ? null : results[1];
}

function fillGallery() {
    $.getJSON("config/image.json", function (data) {
        var counter = 0;
        var numberOfImages = data.images.length;
        var owner = urlParam("owner");
        if (owner != null) {
            $('#content').prepend('<h1>Photos de ' + owner.charAt(0).toUpperCase() + owner.slice(1));
        }
        $.each(data.images, function (i) {
            var elem = data.images[numberOfImages - i - 1];
            if (elem.owner === owner || owner == null) {
                counter++;
                $('.imageGallery1').append("<div class='col-lg-3 col-md-4 col-sm-6 " + elem.tags.join(" ") + "'>" +
                    "                <div class='h_gallery_item'>" +
                    "                    <img src='" + elem.url + "' alt=''>" +
                    "                    <div class='hover'>" +
                    "                        <a href='#'><h4>" + elem.title + "</h4></a>" +
                    "                        <a class='light' href='" + elem.url + "'><i class='fa fa-expand'></i></a>" +
                    "                    </div>" +
                    "                </div>" +
                    "            </div>");
            }
        });
        if (counter === 0) {
            $('.imageGallery1').append("<p>Il n'y a pas encore de photo</p>");
        }
    });
}

var checkExist = setInterval(function () {
    if ($('.imageGallery1').length) {
        clearInterval(checkExist);
        fillGallery();
    }
}, 100); // check every 100ms
