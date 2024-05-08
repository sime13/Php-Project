<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <h3>Pagina de LogIn</h3>
        <form action="processo_registrar.php" method="Post">
            <label for="nome" id="nome"></label> <br>
            <input type="text" name="nome" placeholder="Nome"> <br><br>

            <label for="email" id="email"></label><br>
            <input type="text" name="email" placeholder="Email"> <br><br>

            <label for="senha" id="senha"></label><br>
            <input type="text" name="senha" placeholder="Senha"> <br><br>

            <input type="submit" value="Cadastrar">
        </form>
    </center>
</body>

</html>