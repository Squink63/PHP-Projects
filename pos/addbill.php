<?php

$name = $_POST['name'];
$price = $_POST['price'];


$db = new PDO('mysql:dbhost=localhost;dbname=project1', "root", "");

$statement = $db->prepare("INSERT INTO billing (name, price) VALUES (:name, :price) ");
$statement->execute(['name' => $name, 'price' => $price,]);

header("location: billings.php");