<?php
require "config.php";
require "./dao/UserDaoMySql.php";

$userDao = new UserDaoMySql($pdo);

$id = filter_input(INPUT_GET, 'id');

$info = false;

if ($id) {

    $user = $userDao->readById($id);
    // $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    // $sql->bindValue(':id', $id);
    // $sql->execute();

    // if ($sql->rowCount() > 0) {
    //     $info = $sql->fetch(PDO::FETCH_ASSOC);
    // }
}

if ($user === false) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <style type="text/css">
        body { background-color: #282a36; }
    </style>
</head>

<body>
    <h1>Editar Usuário</h1>
    <form action="edit_action.php" method="POST">
        <input type="hidden" name="id" value="<?=$user->getId(); ?>">
        <label>
            Name:<br>
            <input type="text" name="name" value="<?=$user->getNome(); ?>">
        </label><br><br>

        <label>
            Email:<br />
            <input type="email" name="email" value="<?=$user->getEmail(); ?>">
        </label><br><br>

        <input type="submit" value="Edit">
    </form>
</body>

</html>