
<?php 
function connexion(){
    $ma_db= new PDO(
        "mysql:dbname=mediatheque;host=localhost;port=3306","root","", 
        array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES \'UTF8\'',
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        )
    );
    return $ma_db;
}
?>

<?php 

function affichertout($ma_db, $page = 1){
    
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
    foreach ($tab as $row) {
    $renvoi .= '<div class="film">';
    $renvoi .= '<h3>'.$row["films_titre"].'</h3>';
    $renvoi .= '<p>'.$row["films_annee"].'</p>';
    $renvoi .= '<img src="images/'.$row["films_affiche"].'" width="150">';
    $renvoi .= '<p>'.substr($row["films_resume"], 0, 100).'...</p>';
    $renvoi .= '</div>';
}
    
    $renvoi .= '<div class="nav-buttons">';

    // Page précédente
    if ($page > 1) {
        $renvoi .= '<form method="GET" action="">';
        $renvoi .= '<input type="hidden" name="page" value="'.($page - 1).'">';
        $renvoi .= '<input type="submit" value="<<">';
        $renvoi .= '</form>';
    }

    // Page suivante
    $renvoi .= '<form method="GET" action="">';
    $renvoi .= '<input type="hidden" name="page" value="'.($page + 1).'">';
    $renvoi .= '<input type="submit" value=">>">';
    $renvoi .= '</form>';

    $renvoi .= '</div>';

    return $renvoi;
}

?>
