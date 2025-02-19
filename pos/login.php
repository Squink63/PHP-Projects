


<?php

$name = $_POST["name"];
$password = $_POST["password"];

$db = new PDO('mysql:dbhost=localhost;dbname=project1', "root", "");

$statement = $db->prepare("SELECT * FROM users WHERE name=:name AND password=:password");
$statement->execute(['name' => $name, 'password' => $password]);
$user =  $statement->fetch();


if ($user) {
    session_start();

    $_SESSION['user1'] = $user;
    if ($user['role_id'] == 1){
        header("location: admin.php");
        
    } else {
        header("location: admin.php");
        
    }
    
    
} else {
    header("location: index.php?incorrect=login");
}

?>