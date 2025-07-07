<?php
function drawAffiche($class,$imgsrc,$alt,$title)
{
    echo "<div class=>".$class.">";
    echo "<img src='$imgsrc' alt='$alt'>";
    echo "<h2>$title</h2>";
    echo "</div>";
}
?>