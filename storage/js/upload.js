var form = $("form#upload-form");

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
    inputFolderList += "<option value='" + folderList[index] + "'>" + folderList[index].toUpperCase() + "</option>";
});
inputFolderList += "</select>";
form.submit(function (e) {
    if ($(".image-form").length === 0) {
        e.preventDefault();
        $("input[type=submit]").val("Envoyer")
        $(".image-form").remove()
        form.find("input[type=file]").each(function (index, field) {
            for (var i = 0; i < field.files.length; i++) {
                var inputFolderListTemp = "<select multiple name='tags" + i + "[]' required>" + inputFolderList;
                const file = field.files[i];
                form.append('<div class="image-form row"><img class="image-preview col-2" src="' + URL.createObjectURL(file) + '"><div class="col-10"><div class="row"><p>Nom :</p><input name="title' + i + '" type="text" value="' + file.name.split('.').slice(0, -1).join('.') + '" required></div><div class="row"><p>Dossier :</p>' + inputFolderListTemp + '</div></div></div>')
            }
        });
    }
});