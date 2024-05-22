<?php
include_once '../../config.php';
include_once '../../classes/movie.php';

$sql = "SELECT id,titulo,genero,imagem,video,descricao FROM filmes";
$result = $conn->query($sql);
$movies = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $movies[] = new Movie($row['id'], $row['titulo'], $row['genero'], $row['imagem'], $row['video']);
    }
}

return $movies;
