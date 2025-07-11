<?php 

require_once "connexion.php";
require_once "affichertout.php";
require_once "rechercheActeur.php";
require_once "rechercheFilmTitreSynopsis.php";



$titre = "";
$message = "";

try {
    $ma_db = connexion();
} catch(Exception $e) {
    die("erreur fatale : " . $e->getMessage() . 
        "<form><input type='button' value='retour' onclick='history.go(-1)'></form>");
}

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

// Priorité : acteur > mot-clé > tout afficher
if (!empty($_GET['acteur'])) {
    $acteur = $_GET['acteur'];
    $resultats = rechercheActeur($ma_db, $acteur);
} elseif (!empty($_GET['motclé'])) {
    $motcle = $_GET['motclé'];
    $resultats = rechercheFilmTitreSynopsis($ma_db, $motcle);
} else {
    // Aucun filtre → tous les films
    $message .= affichertout($ma_db, $page);
    $resultats = null; // pour éviter l'affichage en double
}

// Si on a eu des résultats (acteur ou motclé), on les affiche
if (!empty($resultats)) {
    $message .= '<div class="grid-films">';
    foreach ($resultats as $row) {
        $message .= '<div class="film">';
        $message .= '<h3>' . $row["films_titre"] . '</h3>';
        $message .= '<p>' . $row["films_annee"] . '</p>';
        $message .= '<img src="images/' . $row["films_affiche"] . '" width="150">';
        $message .= '<p>' . substr($row["films_resume"], 0, 100) . '...</p>';
        $message .= '</div>';
    }
    $message .= '</div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Médiathèque</title>
	<link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="top">
	<div class="titre">
	<h1>Médiathèque</h1>
	</div>

<div class="form">
            <form method="GET" action="">
                <div class="barrederecherche">
                    <div>
                        <select name="genre">
                            <option value="">Tous les genres</option>
                            <option value="action">Action</option>
                            <option value="drame">Drame</option>
                            <!-- Dynamique via BDD -->
                        </select>
                    </div>
                    <div>
                        <input list="acteurs" name="acteur" id="acteur-id" type="search" placeholder="Entrez un nom d'acteur" autocomplete="on">
                        <datalist id="acteurs">
                            <option value="Donald Trump"></option>
                            <!-- Dynamique via PHP ensuite -->
                        </datalist>
                    </div>

                    <div>
                        <input type="search" id="motclé-id" name="motclé" placeholder="Par mot-clé ">
                    </div>
                </div>
                <div class="bouton-section">
                    <button type="reset" id="reset-id">Annuler</button>
                    <button type="submit" id="recherche-id">Recherche</button>
                </div>
            </form>
        </div>

        <br><br>
    </div> 


	<div class="résultats">
		<h2>Résultats</h2>
		
	<div class="pagination">
</div>
		<?php 
		echo $message;
		 ?>
	</div>


</body>
</html>