<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Storage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script
			  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
			  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
			  crossorigin="anonymous"></script>
              <script src="https://unpkg.com/draggabilly@2/dist/draggabilly.pkgd.min.js"></script>

    <script src="main.js"></script>
</head>
<body>
<header>
  <div class="logo">ORGANIZATION</div>
  <ul>
    <li>Help</li>
    <li class="active">Dashboard</li>
    <li>My Profile</li>
  </ul>
</header>

<section id="wrapper">
  <nav>
    <ul>
      <li class="active tooltiper" data-tooltip="My documents"><i class="fa fa-folder-open-o" aria-hidden="true"></i></li>
      <li class="tooltiper disabled" data-tooltip="Available soon"><i class="fa fa-times" aria-hidden="true"></i></li>
      <li class="tooltiper disabled" data-tooltip="Available soon"><i class="fa fa-times" aria-hidden="true"></i></li>
    </ul>
  </nav>
  <div class="main">
    <h1>My documents</h1>
    <div class="input-wrap"><input id="searchbar" type="search" placeholder="Search a file..." /><i class="fa fa-search" aria-hidden="true"></i></div>
    <div class="left">
      <div class="top-droppable folder tooltiper tooltiper-up" data-tooltip="0 file" id="folder1"><i class="fa fa-folder" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i><p>Folder 1</p></div>
      <div class="top-droppable folder tooltiper tooltiper-up" data-tooltip="0 file" id="folder2"><i class="fa fa-folder" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i><p>Folder 2</p></div>
      <div class="top-droppable folder tooltiper tooltiper-up" data-tooltip="0 file" id="folder3"><i class="fa fa-folder" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i><p>Folder 3</p></div>
      <div class="top-droppable folder tooltiper tooltiper-up" data-tooltip="0 file" id="folder4"><i class="fa fa-folder" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i><p>Folder 4</p></div>
      <div class="top-droppable folder tooltiper tooltiper-up" data-tooltip="0 file" id="folder5"><i class="fa fa-folder" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i><p>Folder 5</p></div>
    </div>
  </div>
  <div class="right">
    <div class="input-select-wrap">
      <div class="fileUpload">
        <span>+</span><p>Add your files</p>
      </div>
      <input id='fileSelect' multiple name='fileSelect' type='file'>
    </div>
    <div id='draggableFile'>
      <span>Drop your files here<br/><span>You can drop your files here to add them to your documents</span></span>
    </div>
    <div id='result'></div>
  </div>
  
  <div class="top-droppable folder-content easeout2 closed" id="folder1-content">
    <div class="close-folder-content"><i class="fa fa-times" aria-hidden="true"></i></div>
    <h2><i class="fa fa-folder" aria-hidden="true"></i><span>Folder 1</span></h2>
  </div>
  
  <div class="top-droppable folder-content easeout2 closed" id="folder2-content">
    <div class="close-folder-content"><i class="fa fa-times" aria-hidden="true"></i></div>
    <h2><i class="fa fa-folder" aria-hidden="true"></i><span>Folder 2</span></h2>
  </div>
  
  <div class="top-droppable folder-content easeout2 closed" id="folder3-content">
    <div class="close-folder-content"><i class="fa fa-times" aria-hidden="true"></i></div>
    <h2><i class="fa fa-folder" aria-hidden="true"></i><span>Folder 3</span></h2>
  </div>
  
  <div class="top-droppable folder-content easeout2 closed" id="folder4-content">
    <div class="close-folder-content"><i class="fa fa-times" aria-hidden="true"></i></div>
    <h2><i class="fa fa-folder" aria-hidden="true"></i><span>Folder 4</span></h2>
  </div>
  
  <div class="top-droppable folder-content easeout2 closed" id="folder5-content">
    <div class="close-folder-content"><i class="fa fa-times" aria-hidden="true"></i></div>
    <h2><i class="fa fa-folder" aria-hidden="true"></i><span>Folder 5</span></h2>
  </div>
</section>


</body>
</html>