

<?php
function rechercheActeur($db, $acteur) {
    $sql = "SELECT * FROM films f
            LEFT JOIN films_acteurs fa ON f.films_id = fa.fa_films_id
            LEFT JOIN acteurs a ON fa.fa_acteurs_id = a.acteurs_id
            WHERE a.acteurs_nom LIKE :acteur";

    $instru = $db->prepare($sql);
    $instru->bindValue(':acteur', "%$acteur%", PDO::PARAM_STR);
    $instru->execute();
    $instru->setFetchMode(PDO::FETCH_ASSOC);
    
    return $instru->fetchAll();
}
?>
