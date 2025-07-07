<?php
function rechercheFilmTitreSynopsis($db, $atfind) // retourne le tableau de résultat
{
    $sql = "select * from films where films_titre like(".'%'.$atfind.'%'.") OR films_resume like(".'%'.$atfind.'%'.");";
    $instru = $db->prepare($sql);
    $instru->execute();
    $instru->SetFetchMode(PDO::FETCH_ASSOC);
		// on récupére un tab associatif avec comme clé le nom des colonnes
	$tab=$instru->fetchAll();
    return $tab;
}
?>