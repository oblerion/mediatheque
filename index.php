<?php
session_start();
include_once "php/connexion.php";
include_once "php/affiche.php";
$titre="";
$message="";
try {
	$ma_db=connexion();
   
	
}
	
catch(Exception $e){
	die("erreur fatale:".$e->getMessage().
		"<form><input type='button' value='retour' onclick='history.go(-1)'></form>"
	);
}

if(isset($_GET['page']))
{
    $_SESSION['page'] =  $_GET['page'];
    if ($_SESSION['page'] < 1) $_SESSION['page'] = 1;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médiathèque</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="top">
	<div class="titre">
	<h1>Médiathèque</h1>
	</div>

    <div class="form">
	    <form method="GET" action="">
        <input type="text" name="keyword" placeholder="Recherche">

        <br><br>
        </form>
    </div>
    </div>

	<div class="résultats">
		<h2>Résultats</h2>
	<div class="pagination">
    </div>
	<?php 
	    echo  affichertout($ma_db,$_SESSION['page']);
	?>
	</div>
</body>
</html>