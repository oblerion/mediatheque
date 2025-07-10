<?php 
	//require_once "fonctions.php";
	require_once "php(testing)/connexion.php";
	require_once "php(testing)/carousel.php";
    require_once "php(testing)/pageOffset.php";
    require_once "php(testing)/filmParPage.php";
    require_once "php(testing)/rechercheDefault.php";
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
				<?php
				if ($page > 1) {
					echo '<a href="?page='.($page - 1).'"><< Précédent</a> ';
				}
				echo '<a href="?page='.($page + 1).'">Suivant >></a>';
				?>
			</div>
			<?php 
				echo carousel($page , rechercheDefault($ma_db,filmParPage(),pageOffset($page)));
			?>
		</div>
	</body>
</html>
