<?php
require_once '../../config/database.php';
require_once '../../model/admin.php';
require_once '../../controller/adminController.php';


$database = new Database();
$db = $database->getConnection();
$admin = new Admin($db);

$adminController = new admincontroller();
$adminController->create();


?>

<!DOCTYPE html>
<html>

<head>
    <title>Adicionar Novo Administrador</title>
</head>

<body>
    <h1>Adicionar Novo Administrador</h1>
    <hr>
    <form action="" method="post">
        <label for="nome">Nome</label><br>
        <input type="text" name="nome" id="nome" required><br><br>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" required><br><br>
        <label for="senha">Senha</label><br>
        <input type="password" name="senha" id="senha" required><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>