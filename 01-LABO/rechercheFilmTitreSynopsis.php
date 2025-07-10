
<?php
function rechercheFilmTitreSynopsis($db, $atfind) {
    $sql = "SELECT * FROM films 
            WHERE films_titre LIKE :search 
            OR films_resume LIKE :search";

    $instru = $db->prepare($sql);
    $like = "%$atfind%";
    $instru->bindValue(':search', $like, PDO::PARAM_STR);
    $instru->execute();
    $instru->setFetchMode(PDO::FETCH_ASSOC);
    
    return $instru->fetchAll();
}
?>
