<?php
// Conexão com o banco de dados
require_once 'conection.php';

// Verificar se os dados foram enviados via POST
if (isset($_POST['id']) && isset($_POST['tarefa'])) {
    $id = $_POST['id'];
    $tarefa = $_POST['tarefa'];

    // Consulta SQL para atualizar os dados do item com base no ID
    $query = "UPDATE list SET tarefa = '$tarefa' WHERE id = $id";
    $resultado = $conn->query($query);

    if ($resultado === true) {
        echo "<script>
        alert ('Tarefa cadastrada com sucesso!');
        window.location='index.php'
    </script>";
    } else {
        echo "Erro ao atualizar o item.";
    }
} else {
    echo "Dados do item não especificados.";
}

// Fechar conexão com o banco de dados
$conn->close();
