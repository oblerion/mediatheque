<?php
include_once "buttonFlèche.php";
include_once "film.php";

function carousel($ma_db,$page){
    $films_par_page = 4;
    $offset = ($page - 1) * $films_par_page;
    $sql = "SELECT * FROM films LIMIT :limit OFFSET :offset;";

    $instru=$ma_db->prepare($sql);
    $instru->bindValue(':limit', $films_par_page, PDO::PARAM_INT);
    $instru->bindValue(':offset', $offset, PDO::PARAM_INT);
    $instru->execute();
    $instru->SetFetchMode(PDO::FETCH_ASSOC);

    $tab=$instru->fetchAll();

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