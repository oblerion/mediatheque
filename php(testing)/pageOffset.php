<?php
include_once "filmParPage.php";
function pageOffset($page) {
    return ($page - 1) * filmParPage();
}
?>