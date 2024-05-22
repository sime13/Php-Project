<?php
include_once '../../config.php';
include_once '../../classes/movie.php';

// Verifica se o método de solicitação é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $titulo = $_POST["titulo"];
    $genero = $_POST["genero"];
    $descricao = $_POST["descricao"];
    $imagem = $_POST["imagem"];
    $video = $_POST["video"];

    // Cria um novo objeto Movie
    $movie = new Movie($titulo, $genero, $descricao, $imagem, $video);

    // Insere os dados no banco de dados
    $sql = "INSERT INTO filmes (titulo, genero, descricao, imagem, video) VALUES ('$titulo', '$genero', '$descricao', '$imagem', '$video')";
    if ($conn->query($sql) === TRUE) {
        // Alerta de sucesso e redirecionamento

        header("Location: movieform.php");
        echo "<script>
                alert('Filme adicionado com sucesso!');
              </script>";
        exit;
    } else {
        echo "Erro ao cadastrar filme: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
} else {
    echo "Método de solicitação inválido.";
}
