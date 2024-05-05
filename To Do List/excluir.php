<?php
require_once 'conection.php';

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$id = $_GET['id'];
$cadastrar = mysqli_query($conn, "DELETE FROM list WHERE ID=$id ");

if ($cadastrar === true) {
    echo "<script>
        alert('Tarefa excluída com sucesso!');
        window.location='index.php'
    </script>";
} else {
    echo "<script>
        alert ('Tarefa não excluída!');
        window.location='index.php'
    </script>";
}

?>
<?php ?>