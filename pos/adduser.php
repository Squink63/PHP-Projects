<?php

$name = $_POST['name'];
$phone = $_POST['phone'];
$role = $_POST['role'];

$db = new PDO('mysql:dbhost=localhost;dbname=project1', "root", "");

$statement = $db->prepare("INSERT INTO users (name, phone,password, role) VALUES (:name, :phone, :password, :role) ");
$statement->execute(['name' => $name, 'phone' => $phone,'password' => "password", 'role' => $role]);

header("location: user.php");