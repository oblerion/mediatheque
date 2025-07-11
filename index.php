<?php 
	//require_once "fonctions.php";
	$PHPPATH = 'php(testing)';
	require_once "$PHPPATH/connexion.php";
	require_once "$PHPPATH/carousel.php";
	require_once "$PHPPATH/pageOffset.php";
	require_once "$PHPPATH/filmParPage.php";
	require_once "$PHPPATH/rechercheDefault.php";
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

	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	if ($page < 1) $page = 1;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Médiathèque</title>
		<link rel="stylesheet" href="styles/style.css">
        	<link rel="icon" href="pedro_sanchez.webp">
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
				echo carousel($page , rechercheDefault($ma_db,filmParPage(),pageOffset($page)));
			?>
		</div>
	</body>
</html>
