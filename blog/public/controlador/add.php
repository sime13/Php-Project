<?php
require_once '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $conteudo = $_POST['conteudo'];
    $categoria = $_POST['categoria'];
    $video = $_POST['video'];

    // Verificação e upload da imagem
    $imagem = null;
    $imagem_tipo = null;

    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['file'];
        $fileExt = pathinfo($file['name'], PATHINFO_EXTENSION);
        $allowed = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array(strtolower($fileExt), $allowed)) {
            $imagem = file_get_contents($file['tmp_name']);
            $imagem_tipo = $file['type'];
        } else {
            echo "Tipo de arquivo não permitido.";
            exit;
        }
    }

    // Prepara a declaração SQL
    $sql = $conn->prepare("INSERT INTO conteudos (titulo, descricao, conteudo, categoria, imagem, imagem_tipo, video) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param("sssssss", $titulo, $descricao, $conteudo, $categoria, $imagem, $imagem_tipo, $video);

    if ($sql->execute()) {
        echo "Conteúdo adicionado com sucesso!";
    } else {
        echo "Erro: " . $sql->error;
    }

    $sql->close();
}

$conn->close();
?>;