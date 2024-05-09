<?php
$servername = 'localhost';
$username = '@';
$password = '1234';
$dbname = 'SimeTechDb';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare variables from POST data
$nome = $_POST['nome_completo'];
$mail = $_POST['email'];
$msg = $_POST['mensagem'];

// SQL query with proper concatenation
$sql = "INSERT INTO contato (nome_completo, email, mensagem) VALUES ('$nome', '$mail', '$msg')";

// Execute query
if ($conn->query($sql) === true) {
    echo "<script>alert('Mensagem enviada com sucesso!');
    window.location='index.php'</script>
    ";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
