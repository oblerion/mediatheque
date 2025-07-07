<?php
function rechercheFilmTitre($db, $atfind)
{
    $sql = "SELECT * FROM films WHERE films_titre LIKE(%$atfind%);";
    $instru = $db->prepare($sql);
    $instru->execute();
    $instru->SetFetchMode(PDO::FETCH_ASSOC);
		// on récupére un tab associatif avec comme clé le nom des colonnes
	$tab=$instru->fetchAll();
    return $tab;
}
?>