<?php
if (isset($_POST['url']) && isset($_POST['index'])) {
    $pathConfig = './config/image.json';
    $jsonString = file_get_contents($pathConfig);
    $data = json_decode($jsonString, true);

    if ($data['images'][$_POST['index']]['url'] == $_POST['url']) {
        //if ($_SESSION['user'] === $data['images'][$_POST['index']]['owner']) {
        $data['images'][$_POST['index']]['tags'] = ['deleted'];
        //}
    } else {
        for ($i = 0; $i < count($data['images']); $i++) {
            //if ($_SESSION['user'] === $data['images'][$i]['owner']) {
            if ($data['images'][$i]['url'] === $_POST['url']) {
                $data['images'][$i]['tags'] = ['deleted'];
            }
            //}
        }
    }


    $newJsonString = json_encode($data);
    file_put_contents($pathConfig, $newJsonString);
}