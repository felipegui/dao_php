<?php
$database = 'test';
$database_localhost = 'localhost';
$database_user = 'root';
$database_password = '';

$pdo = new PDO("mysql:dbname=".$database.";host=".$database_localhost, $database_user, $database_password);