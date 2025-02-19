<?php

$name = $_POST["name"];
$role = $_POST["role"];

$db = new PDO('mysql:dbhost=localhost;dbname=project1', "root", "");

$statement = $db->prepare("INSERT INTO roles (name) VALUES (:name)");
$statement->execute(['name' => $name]);

header("location: role.php");