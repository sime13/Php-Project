<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <h1>Adicionar Filme</h1>
        <form action="addmovie.php" method="post">
            <label for="titulo">Título:</label><br>
            <input type="text" id="titulo" name="titulo" required><br><br>

            <label for="descricao">Descrição:</label><br>
            <input type="text" id="descricao" name="descricao"><br><br>

            <label for="genero">Gênero:</label><br>
            <select name="genero" id="genero" required>
                <option value="Comedia">Comédia</option>
                <option value="Action">Ação</option>
                <option value="Drama">Drama</option>
                <option value="Novela">Novela</option>
                <option value="Aventura">Aventura</option>
                <option value="Terror">Terror</option>
                <option value="Romance">Romance</option>
                <option value="Suspense">Suspense</option>
                <option value="Ficção Científica">Ficção Científica</option>
                <option value="Científica">Científica</option>
                <option value="Fantasia">Fantasia</option>
                <option value="Animação">Animação</option>
            </select><br><br>

            <label for="imagem">Imagem:</label><br>
            <input type="text" id="imagem" name="imagem" placeholder="Link da imagem"><br><br>

            <label for="video">Vídeo:</label><br>
            <input type="text" id="video" name="video" placeholder="Link do vídeo"><br><br>

            <input type="submit" value="Adicionar Filme">
        </form>
    </center>
</body>

</html>