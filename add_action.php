<?php
require "config.php";
require "./dao/UserDaoMySql.php";

$userDao = new UserDaoMySql($pdo);

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($name && $email) {

    if ($userDao->readByEmail($email) === false) {

        $newUser = new User();
        $newUser->setNome($name);
        $newUser->setEmail($email);

        $userDao->create($newUser);

        header("Location: index.php");
        exit;

    } else {
        header("Location: add.php");
        exit;
    }

    // $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    // $sql->bindValue('email', $email);
    // $sql->execute();

    // if ($sql->rowCount() === 0) {

    //     $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:name, :email)");

    //     $sql->bindValue('name', $name);
    //     $sql->bindValue('email', $email);

    //     $sql->execute();

    //     header("Location: index.php");
    //     exit;
    // } else {
    //     header("Location: add.php");
    //     exit;
    // }
} else {
    header("Location: add.php");
    exit;
}