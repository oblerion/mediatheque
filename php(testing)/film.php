<?php
function film($class,$imgsrc,$alt,$titre,$annee,$resume)
{
    $renvoi = "";
    $renvoi .= "<div class=$class>";
    $renvoi .= "<h3>$titre</h3>";
    $renvoi .= "<p>$annee</p>";
    $renvoi .= "<img src='images/$imgsrc' alt='$alt' width='150'>";
    $renvoi .= "<p>".substr($resume, 0, 100)."...</p>";
    $renvoi .= "</div>";
    return $renvoi;
}
?>