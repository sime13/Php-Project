<?php
require_once '../../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $sql = $conn->prepare("INSERT INTO admins (username,email,password) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $username, $email, $password);

    if ($sql->execute()) {
        echo "Conteúdo adicionado com sucesso!";
    } else {
        echo "Erro: " . $sql->error;
    }
    $sql->close();
}

$conn->close();
?> ;