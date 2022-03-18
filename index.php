<?php
require "config.php";
require "./dao/UserDaoMySql.php";

$userDao = new UserDaoMySql($pdo);

$list = $userDao->readAll();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conceito DAO</title>
    <style type="text/css">
        body {
            background-color: #282a36;
        }
        td {
            color: #FFF;
            font-weight: bold;
        }
        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <h2>Testing the CRUD concept</h2>

    <a href="add.php">Add user</a>

    <table border="1" width="100%">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>ACTION</th>
        </tr>

        <?php foreach ($list as $usuario) : ?>
            <tr>
                <td><?= $usuario->getId(); ?></td>
                <td><?= $usuario->getNome(); ?></td>
                <td><?= $usuario->getEmail(); ?></td>
                <td>
                    <a href="editar.php?id=<?= $usuario->getId(); ?>">[ Editar ]</a>
                    <a href="excluir.php?id=<?= $usuario->getId(); ?>" onclick="return confirm('Tem certeza que deseja excluir?')">[ Excluir ]</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</body>

</html>