<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    // Redireciona para a página de login se não estiver logado
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>

<body>
    <h1>Opa admin</h1>
    <?php
    // Exibe o ID do usuário logado
    echo "User ID: " . htmlspecialchars($_SESSION['user_id']);
    echo "User email " . htmlspecialchars($_SESSION['user_email']);
    ?>
</body>

</html>