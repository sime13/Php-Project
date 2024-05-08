<?php
require_once 'conection.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    // require_once 'conexao.php'; // Supondo que este é o arquivo de conexão com o banco de dados

    // Verificar se o ID do usuário está armazenado na sessão
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];

        // Preparar e executar a consulta para obter os dados do usuário
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verificar se a consulta retornou algum resultado
        if ($result->num_rows > 0) {
            $dados_usuario = $result->fetch_assoc(); // Obter os dados do usuário
            // Exibir os dados do usuário
            echo "Nome: " . $dados_usuario['nome'] . "<br>";
            echo "Email: " . $dados_usuario['email'] . "<br>";
            // E assim por diante...
        } else {
            echo "Usuário não encontrado!";
        }
    } else {
        echo "ID do usuário não encontrado na sessão.";
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
    ?>






</body>

</html>