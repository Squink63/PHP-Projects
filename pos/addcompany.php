<?php

$name = $_POST['name'];
$address = $_POST['address'];


$db = new PDO('mysql:dbhost=localhost;dbname=project1', "root", "");

$statement = $db->prepare("INSERT INTO companies (name, address) VALUES (:name, :address) ");
$statement->execute(['name' => $name, 'address' => $address,]);

header("location: companies.php");