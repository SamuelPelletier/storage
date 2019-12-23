function urlParam(name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    return results == null ? null : results[1];
}

function remove(imageUrl, index) {
    $.ajax({
        url: 'delete-process.php',
        type: 'POST',
        data: {url: imageUrl, index: index},
        success: function (data) {
            $('.imageGallery1').isotope('remove', $('#image' + index));
            $('.imageGallery1').isotope({
                filter: $('.gallery_filter').find(".active").data('filter')
            });
        }
    });
}

function fillGallery() {
    $.getJSON("config/image.json", function (data) {
        var counter = 0;
        var numberOfImages = data.images.length;
        var owner = urlParam("owner");
        var year = urlParam("year");
        var maxImage = urlParam("max");
        var text = '';
        if (year != null) {
            text += year;
        }
        if (owner != null) {
            text += ' de ' + owner.charAt(0).toUpperCase() + owner.slice(1);
        }
        if (text !== '') {
            $('#content').prepend('<h1>Photos ' + text);
        }
        $.each(data.images, function (i) {
            var elem = data.images[numberOfImages - i - 1];
            if ((elem.year === year || year == null) && (elem.owner === owner || owner == null) && !elem.tags.includes("deleted")) {
                counter++;
                var deleteButton = "<div class='remove-button'><span  class='fa fa-trash' onclick='remove(\"" + elem.url + "\"," + i + ")'></span></div>";
                $('.imageGallery1').append("<div id='image" + i + "' class='col-lg-3 col-md-4 col-sm-6 " + elem.tags.join(" ") + "'>" +
                    deleteButton +
                    "                <div class='h_gallery_item'>" +
                    "                    <img src='" + elem.url + "' alt=''>" +
                    "                    <div class='hover'>" +
                    "                        <a href='#'><h4>" + elem.title + "</h4></a>" +
                    "                        <a class='light' href='" + elem.url + "'><i class='fa fa-expand'></i></a>" +
                    "                    </div>" +
                    "                </div>" +
                    "            </div>");
            }
            if (maxImage != null && counter >= maxImage) {
                return false;
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
