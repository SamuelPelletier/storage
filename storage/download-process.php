<?php
if (isset($_GET['param']) && isset($_GET['type'])) {
    $pathConfig = './config/image.json';
    $jsonString = file_get_contents($pathConfig);
    $data = json_decode($jsonString, true);

    $zipName = $_GET['param'] . ".zip";
    $zipPath = './download/' . $zipName;
    $files = array();
    $zip = new \ZipArchive();
    $zip->open($zipPath, \ZipArchive::CREATE);
    foreach ($data['images'] as $image) {
        if (!in_array('deleted', $image['tags'])) {
            if (($_GET['type'] == "owner" && $image['owner'] == $_GET['param']) || ($_GET['type'] == "tag" && in_array($_GET['param'],
                        $image['tags'])) || $_GET['param'] == 'all') {
                $zip->addFromString(basename($image['title']), file_get_contents($image['url']));
            }
        }
    }

    $zip->close();
    header('Content-Description: File Transfer');
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment;filename="' . $zipName . '"');
    header('Content-Length: ' . filesize($zipName));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    readfile($zipPath);
}
echo "<script>window.close();</script>";