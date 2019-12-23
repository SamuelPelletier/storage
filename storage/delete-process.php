<?php
if (isset($_POST['url']) && isset($_POST['index'])) {
    $pathConfig = './config/image.json';
    $jsonString = file_get_contents($pathConfig);
    $data = json_decode($jsonString, true);

    if ($data['images'][$_POST['index']]['url'] == $_POST['url']) {
        $data['images'][$_POST['index']]['tags'] = ['deleted'];
    } else {
        for ($i = 0; $i < count($data['images']); $i++) {
            if ($data['images'][$i]['url'] === $_POST['url']) {
                $data['images'][$i]['tags'] = ['deleted'];
            }
        }
    }
    $newJsonString = json_encode($data);
    file_put_contents($pathConfig, $newJsonString);
}