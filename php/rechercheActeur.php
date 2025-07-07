<?php
function rechercheActeur($db,$acteur)
{
    $sql =
      "select * from films 
      join film_acteurs
      where 
    films_id = (select fa_films_id from films_acteurs
                    where fa_acteurs_id = 
                    (
                        select acteurs_id from acteurs 
                        where acteurs_name like('')))";
}
?>