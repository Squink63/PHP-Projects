<?php

$id = $_GET['id'];


$db = new PDO('mysql:dbhost=localhost;dbname=project1', "root", "");

$statement = $db->prepare("DELETE FROM companies WHERE id=:id");
$statement->execute(['id' => $id]);

header("location: companies.php");