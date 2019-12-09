<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Gallerie</title>
    <div w3-include-html="css.html"></div>
</head>
<body>
<div w3-include-html="menu.html"></div>
<div w3-include-html="small-banner.html"></div>
<div id="content">
    <?php 
if(isset($_POST['submit'])){
 
 // Count total files
 $countfiles = count($_FILES['file']['name']);

 // Looping all files
 for($i=0;$i<$countfiles;$i++){
  $filename = $_FILES['file']['name'][$i];
 
  // Upload file
  if(move_uploaded_file($_FILES['file']['tmp_name'][$i],'img/gallery/'.$filename)){
    $jsonString = file_get_contents('config/image.json');
    $data = json_decode($jsonString, true);

    array_push($data['images'], ['title'=>"bob","url"=>'img/gallery/'.$filename,'tags'=>['1']]);

    $newJsonString = json_encode($data);
    file_put_contents('config/image.json', $newJsonString);
  }
 
 }
} 
?>
<form method='post' action='' enctype='multipart/form-data'>
 <input type="file" name="file[]" id="file" multiple>

 <input type='submit' name='submit' value='Upload'>
</form>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/autoloader.js"></script>
</body>
</html>