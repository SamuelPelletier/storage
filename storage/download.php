<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Télécharger des photos</title>
    <div w3-include-html="css.html"></div>
</head>
<body>
<div w3-include-html="menu.html"></div>
<div w3-include-html="small-banner.html"></div>
<div id="content">
    <h1>Télécharger des photos</h1>
    <h2>Cliquez pour télécharger les photos d'une personne</h2>
    <?php
    include '../config.php';
    echo "<ul>";
    foreach ($loginList as $name => $password) {
        echo "<li><a href='download-process.php?type=owner&param=" . $name . "'>" . ucfirst($name) . "</a></li>";
    }
    echo "</ul>";
    ?>
    <h2>Cliquez pour télécharger les photos d'une catégorie</h2>
    <?php
    $pathConfig = './config/folder.json';
    $jsonString = file_get_contents($pathConfig);
    $data = json_decode($jsonString, true);

    echo "<ul>";
    //echo "<li><a href='download-process.php?type=tag&param=all'>Tous</a></li>";
    foreach ($data['folders'] as $folderName) {
        echo "<li><a href='download-process.php?type=tag&param=" . $folderName . "'>" . ucfirst($folderName) . "</a></li>";
    }
    echo "</ul>";
    ?>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/autoloader.js"></script>
<script src="js/sort.js"></script>
</body>
</html>