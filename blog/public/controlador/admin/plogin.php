<?php
require_once '../../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verifica se o usuário existe
    $sql = $conn->prepare("SELECT id, password FROM admins WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $sql->store_result();
    $sql->bind_result($id, $hashed_password);
    $sql->fetch();

    if ($sql->num_rows > 0) {
        // Verifica a senha
        if ($password == $password) {
            echo "Login bem-sucedido!";
            // Inicia a sessão e armazena os dados do usuário conforme necessário
            session_start();
            $_SESSION['user_id'] = $id;
            $_SESSION['user_email'] = $email;
            // Redireciona para uma página protegida
            header("Location: index.php");
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Nenhum usuário encontrado com este email.";
    }
    $sql->close();
}

$conn->close();

?>;