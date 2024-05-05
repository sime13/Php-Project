<?php
require_once 'conection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <center>
        <h2>Cadastra Tarefas</h2>
        <hr>
    </center>
    <center>
        <form action="cadastrar.php" method="post">
            <input type="text" id="tarefa" name="tarefa" placeholder="Digitar uma nova tarefa" required style=" border-radius:0px; margin:15px; border-top:none; border-right:none; border-left:none; border-bottom: 2px solid black;  background-color: rgb(80, 71, 61); width: 300px; "><br><br>
            <input type="submit" value="Addicionar nova tarefa">
            <br><br>
        </form>
    </center>

    <center>
        <div style="margin: 5px; background:black; width: 400px;; height:auto; color:antiquewhite; overflow:auto; padding:10px;">


            <?php

            if ($conn->connect_error) {
                die('Connection failed: ' . $conn->connect_error);
            }

            $sql = "SELECT * FROM list";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table><tr><th>Tarefas</th></tr> <br> <hr>";
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    //echo "<tr><td>" . $row["id"] . "</td><td>" . $row["tarefa"] . "</td><td></td></tr>";


                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["tarefa"] . "</td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    // Botão Excluir com link para um script PHP que irá excluir o item
                    echo "<td><a href='excluir.php?id=" . $row["id"] . "'>Excluir</a></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td><a href='editar.php?id=" . $row["id"] . "'>Editatar</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Adiciona novo item +";
            }

            $conn->close(); ?>
        </div>
    </center>

</body>

</html>