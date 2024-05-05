<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Tarefas</h2>
    <?php
    $servername = 'localhost';
    $username = '@';
    $password = '1234';
    $dbname = 'TodoDb';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $sql = "SELECT * FROM list";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Tarefas</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["tarefa"] . " </td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();

    ?>
</body>

</html>