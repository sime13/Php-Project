<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Add conteudo </h3>

    <form action="../controlador/add.php" method="post" method="post" enctype="multipart/form-data">

        <label for="titulo">Titulo</label><br>
        <input type="text" name="titulo" placeholder="Titulo"><br><br>

        <label for="descricao">Descricao</label><br>
        <input type="text" name="descricao" placeholder="Descricao"><br><br>

        <label for="conteudo">Conteudo</label><br>
        <input type="text" name="conteudo" placeholder="Conteudo"><br><br>

        <label for="categoria" name="Categoria">Categoria</label><br>
        <select name="categoria" id="categoria"><br>
            <option value="Noticias">Noticias</option>
            <option value="Esportes">Esportes</option>
            <option value="Jogos">Jogos</option>
            <option value="Dinheiro">Dinheiro</option>
            <option value="Politica">Politica</option>
            <option value="Entretenimento">Entretenimento</option>
            <option value="Cultura">Cultura</option>
            <option value="Saude">Saude</option>
            <option value="Viagens">Viagens e Turismo</option>
        </select><br><br>

        <label for="file">Escolha a imagem:</label><br>
        <input type="file" name="file" id="file">
        <br><br>

        <label for="video"></label><br>
        <input type="text" name="video" placeholder="Add link Video"><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>