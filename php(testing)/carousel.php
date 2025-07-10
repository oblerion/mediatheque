<?php
include_once "buttonFlèche.php";
include_once "film.php";
include_once "rechercheDefault.php";
// input : page actuelle, tableau de film
// retour : affichage du carousel
function carousel($page,$tab){
    $renvoi = '<div class="grid-films">';
    foreach ($tab as $row) 
    {
        $renvoi .= film("film",$row["films_affiche"],$row["films_titre"],$row["films_titre"],$row["films_annee"],$row["films_resume"]);
    }
    $renvoi .= "</div>";
    $renvoi .= '<div class="nav-buttons">';

    // Page précédente
    if ($page > 1) {
        $renvoi .= buttonFlèche("<<",($page-1));
    }

    // Page suivante
    $renvoi .= buttonFlèche(">>",($page+1));
    $renvoi .= '</div>';

    return $renvoi;
}
?>