<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>

<?php
include 'config.php';
if(isset($_GET['disconnect']) && $_GET['disconnect'] == 1){
    $_SESSION['user'] = "";
}

if(isset($_SESSION['user']) && $_SESSION['user'] != ""){
    header('Location: storage/');
    exit;
}

if(isset($_POST['username']) && isset($_POST['password'])){
    foreach ($loginList as $username => $password) {
        if($_POST['username'] == $username && $_POST['password'] == $password){
            $_SESSION['user'] = $_POST['username'];
            header('Location: storage/');
            exit;
        }
    }
    echo '<p style="color:red">error</p>';

}

?>

<div class="wrapper">
	<div class="container">
		<h1>Bienvenue</h1>
		
		<form class="form" action='/' method="post">
			<input name='username' type="text" placeholder="Identifiant">
			<input name='password' type="password" placeholder="Mot de passe">
			<button type="submit" id="login-button">Connexion</button>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="main.js"></script>
</html>