<?php
require_once 'conection.php';
$A = $_POST['tarefa'];
$cadastrar = mysqli_query($conn, "INSERT INTO list (tarefa) VALUES('$A')");

if ($cadastrar === true) {
    echo "<script>
        alert ('Tarefa cadastrada com sucesso!');
        window.location='index.php'
    </script>";
} else {
    echo "<script>
        alert ('Tarefa nao cadastrada !');
        window.location='index.php'
    </script>";
}

?>
<?php ?>