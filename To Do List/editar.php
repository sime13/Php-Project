<?php
require_once 'conection.php';

if ($conn->connect_error) {
    die('Erro de conexão: ' . $conn->connect_error);
}

// Verificar se o ID do item a ser editado foi fornecido via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para selecionar os dados do item com base no ID
    $query = "SELECT * FROM list WHERE id = $id";
    $resultado = $conn->query($query);

    if ($resultado->num_rows == 1) {
        // Exibir o formulário de edição
        $row = $resultado->fetch_assoc();
?>
        <form action="processo_editar.php" method="POST">
            <!-- Campos do formulário preenchidos com os dados do item -->
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="text" name="tarefa" value="<?php echo $row['tarefa']; ?>">

            <!-- Adicione mais campos conforme necessário -->

            <input type="submit" value="Salvar">
        </form>
<?php
    } else {
        echo "Item não encontrado.";
    }
} else {
    echo "ID do item não especificado.";
}

// Fechar conexão com o banco de dados
$conn->close();
?>