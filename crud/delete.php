<?php
$id = $_POST["id"];
$db = new PDO("mysql:dbhost=localhost;dbname=test", "root", "");
$query = "DELETE FROM students WHERE id = :id";
$statement = $db->prepare($query); 
$statement->bindParam(':id', $id);
$statement->execute();

header("location: index.php");