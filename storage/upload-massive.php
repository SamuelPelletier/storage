<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Déposer des photos en vrac</title>
    <div w3-include-html="css.html"></div>
</head>
<body>
<div w3-include-html="menu.html"></div>
<div w3-include-html="small-banner.html"></div>
<div id="content">
    <h1>Déposer des photos en vrac</h1>
    <?php
    include '../config.php';
    if (isset($_POST['submit'])) {
        $pathConfig = './config/image.json';

        // Count total files
        $countfiles = count($_FILES['file']['name']);

        // Looping all files
        for ($i = 0; $i < $countfiles; $i++) {
            $filename = $_FILES['file']['name'][$i];

            $counter = 1;
            while (file_exists('./img/gallery/' . $filename)) {
                $filename = pathinfo($filename)['filename'] . $counter . '.' . pathinfo($filename)['extension'];
                $counter++;
            }

            // Upload file
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], 'img/gallery/' . $filename)) {
                $jsonString = file_get_contents($pathConfig);
                $data = json_decode($jsonString, true);

                array_push($data['images'],
                    [
                        'title' => $filename,
                        "url" => 'img/gallery/' . $filename,
                        'owner' => $_SESSION['user'],
                        'tags' => ['vrac']
                    ]);

                $newJsonString = json_encode($data);
                file_put_contents($pathConfig, $newJsonString);
            }

        }
        echo "Les photos ont été correctement envoyé !";
    }
    ?>
    <form id='upload-massive-form' method='post' action='./upload-massive.php' enctype='multipart/form-data'>
        <input type="file" name="file[]" id="file" multiple accept=".gif,.jpg,.jpeg,.png">

        <input type='submit' name='submit' value='Suivant'>
    </form>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/autoloader.js"></script>
</body>
</html>