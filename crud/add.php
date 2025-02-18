<?php

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$department = $_POST["department"];

$sql = "INSERT INTO students (name, email, phone, address, department) VALUES (:name, :email, :phone, :address, :department)";
// echo $sql;

$db = new PDO('mysql:dbhost=localhost;dbname=test', "root", "");
$statement = $db -> prepare($sql);
$statement->execute(['name' => $name, 'email' => $email, 'phone' => $phone, 'address' => $address, 'department' => $department]);

header("location: index.php");