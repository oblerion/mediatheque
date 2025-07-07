<?php 
include "connexion.php";
$result=$mysql->query("select * from films_genres");

if (isset($_GET['genre_id']) && $_GET['genre_id'] !== '') {
    $genre_id = (int) $_GET['genre_id'];

    $stmt = $mysqli->prepare("
        SELECT f.* FROM films f
        JOIN films_genres fg ON f.id = fg.film_id
        WHERE fg.genre_id = ?
    ");
    $stmt->bind_param("i", $genre_id);
    $stmt->execute();
    $result = $stmt->get_result();

}
?>