<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Chercher des photos</title>
    <div w3-include-html="css.html"></div>
</head>
<body>
<div w3-include-html="menu.html"></div>
<div w3-include-html="small-banner.html"></div>
<div id="content">
    <h1>Chercher par nom d'utilisateur</h1>
    <?php
    include '../config.php';
    echo "<ul>";
    foreach ($loginList as $name => $password) {
        echo "<li><a href='index.html?owner=" . $name . "'>" . ucfirst($name) . "</a></li>";
    }
    echo "</ul>";
    ?>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/autoloader.js"></script>
<script src="js/sort.js"></script>
</body>
</html>