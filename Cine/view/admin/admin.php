<!DOCTYPE html>
<html>

<head>
    <title>Lista de Administradores</title>
</head>

<body>
    <h1>Administradores</h1>
    <a href="create.php">Criar Novo Administrador</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($admin as $a) : ?>
            <tr>
                <td><?php echo $a['id']; ?></td>
                <td><?php echo $a['nome']; ?></td>
                <td><?php echo $a['email']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $a['id']; ?>">Editar</a>
                    <a href="delete.php?id=<?php echo $a['id']; ?>" onclick="return confirm('Você tem certeza que deseja deletar?')">Deletar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>