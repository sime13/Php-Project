<?php
require_once 'conection.php';

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obter os dados do formulário
$id = $_POST['id'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// Consultar o banco de dados para verificar as credenciais
$sql = "SELECT * FROM usuarios WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($senha == $row['senha']) {

        echo "Login bem-sucedido!";
        $id = $row["id"];
        $_SESSION['id'] = $id;
        header('Location: index.php');
        exit;
        // Redirecionar o usuário para a página inicial ou área restrita
    } else {
        echo "Senha incorreta!";
    }
} else {
    echo "Email não encontrado!";
}

$conn->close();
