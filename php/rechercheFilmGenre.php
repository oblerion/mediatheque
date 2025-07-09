<?php
function rechercheFilmGenre($db,$genre)
{
    $sql = "SELECT * FROM films f LEFT JOIN films_genres fg ON f.films_id = fg.fg_genres_id LEFT JOIN 
  genres g ON fg.fg_genres_id = g.genres_id WHERE g.genres_nom LIKE('%'$genre'%');";
  "SELECT * FROM films f JOIN films_genres fg ON f.films_id = fg.fg_films_id JOIN genres g ON fg.fg_genres_id = g.genres_id WHERE g.genres_nom like('%'$genre'%') ORDER BY f.films_titre;";
    $instru = $db->prepare($sql);
    $instru->execute();
    $instru->SetFetchMode(PDO::FETCH_ASSOC);
    // on récupére un tab associatif avec comme clé le nom des colonnes
    $tab=$instru->fetchAll();
    return $tab;
}

?>