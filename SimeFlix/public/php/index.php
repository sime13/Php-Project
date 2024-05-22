<?php
include_once '../../config.php';
include '../../classes/movie.php';
include '../../src/database.php';


//$movies = $db->getMovies();
//$db->closeConnection();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SimeFlix</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 16px;
            margin: 16px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            flex-basis: 30%;
        }

        .card h3 {
            margin-top: 0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
    </style>
</head>

<body>
    <header>
        <h1>SimeFlix</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="series.php">Series</a></li>
                <li><a href="movies.php">Movies</a></li>
                <li><input type="search" placeholder="pesquisar"></li>
                <li><input type="submit" placeholder="pesquisar"></li>

                <li><a href="about.php">Login</a></li>/
                <li><a href="about.php">Register</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <h2>Lista de Filmes</h2>
        <div class="container">
            <?php if (count($movies) > 0) : ?>
                <?php foreach ($movies as $movie) : ?>
                    <div class="card">
                        <h3><?php echo htmlspecialchars($movie->getTitulo()); ?></h3>
                        <p><strong>Gênero:</strong> <?php echo htmlspecialchars($movie->getGenero()); ?></p>
                        <p><strong>Ano:</strong> <?php echo htmlspecialchars($movie->getImagem()); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Não há filmes cadastrados.</p>
            <?php endif; ?>
        </div>
    </section>

    <?php

    ?>

</body>

</html>