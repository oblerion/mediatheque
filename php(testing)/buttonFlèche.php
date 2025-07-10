<?php
function buttonFlèche($label,$value)
{
    $renvoi = "";
    $renvoi .= '<form method="GET" action="index.php">';
    $renvoi .= "<input type='hidden' name='page' value='$value'>";
    $renvoi .= "<input type='submit' value='$label'>";
    $renvoi .= '</form>';
    return $renvoi;
}
?>