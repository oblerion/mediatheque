<?php
function drawAffiche($class,$imgsrc,$alt,$titre,$annee,$resume)
{
    // echo "<div class=>".$class.">";
    // echo "<img src='$imgsrc' alt='$alt'>";
    // echo "<h2>$title</h2>";
    // echo "</div>";

    $renvoi = "";
    $renvoi .= "<div class=$class>";
    $renvoi .= "<h3>$titre</h3>";
    $renvoi .= "<p>$annee</p>";
    $renvoi .= "<img src='images/$imgsrc' alt='$alt' width='150'>";
    $renvoi .= "<p>".substr($resume, 0, 100)."...</p>";
    $renvoi .= "</div>";
    return $renvoi;
}

function button($label,$value)
{
    $renvoi = "";
    $renvoi .= '<form method="GET" action="">';
    $renvoi .= '<input type="hidden" name="page" value="'.$value.'">';
    $renvoi .= "<input type='submit' value='$label'>";
    $renvoi .= '</form>';
    return $renvoi;
}

function affichertout($ma_db,$page){
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
        $renvoi .= drawAffiche("film","images/".$row["films_affiche"],$row["films_titre"],$row["films_titre"],$row["films_annee"],$row["films_resume"]);
    }
    $renvoi .= "</div>";
    $renvoi .= '<div class="nav-buttons">';

    // Page précédente
    if ($page > 1) {
        $renvoi .= button("<<","($page-1)");
        // $renvoi .= '<form method="GET" action="">';
        // $renvoi .= '<input type="hidden" name="page" value="'.($page - 1).'">';
        // $renvoi .= '<input type="submit" value="<<">';
        // $renvoi .= '</form>';
    }

    // Page suivante

    $renvoi .= button(">>","($page+1)");
    // $renvoi .= '<form method="GET" action="">';
    // $renvoi .= '<input type="hidden" name="page" value="'.($page + 1).'">';
    // $renvoi .= '<input type="submit" value=">>">';
    // $renvoi .= '</form>';

    $renvoi .= '</div>';

    return $renvoi;
}
?>