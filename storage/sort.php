<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Trier des photos</title>
    <div w3-include-html="css.html"></div>
</head>
<body>
<div w3-include-html="menu.html"></div>
<div w3-include-html="small-banner.html"></div>
<div id="content">
    <h1>Trier des photos</h1>
    <?php
    include '../config.php';
    if (isset($_POST['submit'])) {
        $pathConfig = './config/image.json';

        // Count total files
        // -1 for submit and 4 because 4 input by image
        $countfiles = (count($_POST) - 1) / 4;

        // Looping all files
        for ($i = 0; $i < $countfiles; $i++) {
            $jsonString = file_get_contents($pathConfig);
            $data = json_decode($jsonString, true);
            for ($y = 0; $y < count($data['images']); $y++) {
                if ($data['images'][$y]['url'] === $_POST['url' . $i]) {
                    $data['images'][$y]['title'] = $_POST['title' . $i];
                    if (isset($_POST['tags' . $i]) && count($_POST['tags' . $i]) > 0) {
                        $data['images'][$y]['tags'] = $_POST['tags' . $i];
                    }
                }
            }
            $newJsonString = json_encode($data);
            file_put_contents($pathConfig, $newJsonString);
        }

        echo "Les photos ont été correctement envoyé !";
    }
    ?>
    <form id='sort-form' method='post' action='./sort.php' enctype='multipart/form-data'>
        <input type='submit' name='submit' value='Sauvegarder'>
    </form>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/autoloader.js"></script>
<script src="js/sort.js"></script>
</body>
</html>