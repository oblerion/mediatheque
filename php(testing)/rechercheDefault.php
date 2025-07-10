<?php
function rechercheDefault($ma_db,$films_par_page,$offset)
{
    $sql = "SELECT * FROM films LIMIT :limit OFFSET :offset;";
    $instru=$ma_db->prepare($sql);
    $instru->bindValue(':limit', $films_par_page, PDO::PARAM_INT);
    $instru->bindValue(':offset', $offset, PDO::PARAM_INT);
    $instru->execute();
    $instru->SetFetchMode(PDO::FETCH_ASSOC);
    $tab=$instru->fetchAll();
    return $tab;
}

?>