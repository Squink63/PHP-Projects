<?php
$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$department = $_POST["department"];

$db = new PDO('mysql:dbhost=localhost;dbname=test', "root", "");
$query = "UPDATE students SET name = :name, email = :email, phone = :phone, address = :address, department = :department WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':department', $department);
$stmt->bindParam(':id', $id);
$stmt->execute();

header("Location: index.php");