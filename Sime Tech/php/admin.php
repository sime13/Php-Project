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
//$nome = $_POST['nome_completo'];
//$mail = $_POST['email'];
//$msg = $_POST['mensagem'];

// SQL query with proper concatenation
$sql = "SELECT* FROM contato";

// Execute query

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<head>";
    echo " <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>";
    echo "</head>";
    echo " <div class='container'>";
    echo "<table class='table'>
    <thead class='bg-success'>
      <tr>
        <th scope='col'>ID</th>
        <th scope='col'>Nome</th>
        <th scope='col'>Email</th>
        <th scope='col'>Mensagens</th>
      </tr>
    </thead>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        //echo "<tr><td>" . $row["id"] . "</td><td>" . $row["tarefa"] . "</td><td></td></tr>"


        echo "<tbody>";
        echo "<tr>";
        echo "<th scope='row'>" . $row["id"] . "</th>";
        echo "<td>" . $row["nome_completo"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["mensagem"] . "</td>";
        echo "</tr>";
    }
    echo '<a href="index.php">Pagina initial</a>';
    echo "</table>";
    echo "</div>";
} else {
    echo "Adiciona novo item +";
}

// Close connection
$conn->close();
