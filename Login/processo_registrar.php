<?php
require_once 'conection.php';

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obter os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// Inserir os dados no banco de dados
$sql = mysqli_query($conn, "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')");


if ($sql === TRUE) {
    echo "Cadastro realizado com sucesso!";
    header("Location: login.php"); // Redireciona o usuario para a página de login após cadastrar-se
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}

$conn->close();
?>

 
<?php ?>