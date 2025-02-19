<?php

$name = $_POST['name'];
$phone = $_POST['phone'];


$db = new PDO('mysql:dbhost=localhost;dbname=project1', "root", "");

$statement = $db->prepare("INSERT INTO suppliers (name, phone) VALUES (:name, :phone) ");
$statement->execute(['name' => $name, 'phone' => $phone]);

header("location: invoices.php");