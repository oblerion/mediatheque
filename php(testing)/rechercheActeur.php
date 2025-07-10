<?php
function rechercheActeur($db,$acteur)
{
  $sql = "SELECT * FROM films f LEFT JOIN films_acteurs fa ON f.films_id = fa.fa_films_id LEFT JOIN 
  acteurs a ON fa.fa_acteurs_id = a.acteurs_id WHERE a.acteur_nom LIKE('%'$acteur'%');";
  $instru = $db->prepare($sql);
  $instru->execute();
  $instru->SetFetchMode(PDO::FETCH_ASSOC);
  // on récupére un tab associatif avec comme clé le nom des colonnes
  $tab=$instru->fetchAll();
  return $tab;
}
?>