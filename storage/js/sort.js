var form = $("form#sort-form");

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

var inputFolderList = "";

$.each(folderList, function (index) {
    if (folderList[index] != 'vrac') {
        inputFolderList += "<option value='" + folderList[index] + "'>" + folderList[index].toUpperCase() + "</option>";
    }
});
inputFolderList += "</select>";

$.getJSON("config/image.json", function (data) {
    var numberOfImages = data.images.length
    $.each(data.images, function (i) {
        var file = data.images[numberOfImages - i - 1];
        if (file.tags.includes('vrac')) {
            var inputFolderListTemp = "<select multiple name='tags" + i + "[]'>" + inputFolderList;
            form.append('<div class="image-form row"><input name="url' + i + '" class="d-none" type="text" value="' + file.url + '"><img class="image-preview col-2" src="' + file.url + '"><div class="col-10"><div class="row"><p>Nom :</p><input name="title' + i + '" type="text" value="' + file.title + '" required></div><div class="row"><p>Année : </p><input type="number" name="year' + i + '" min="1900" max="2099" step="1" value="' + new Date().getFullYear() + '" required/></div><div class="row"><p>Dossier :</p>' + inputFolderListTemp + '</div></div></div>');
        }
    });

});

