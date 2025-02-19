<?php

require 'vendor/autoload.php';  // Include JWT library

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = "your_secret_key";  // Your secret key for signing the JWT (keep it secure)

$name = $_POST["name"];
$password = $_POST["password"];

$db = new PDO('mysql:dbhost=localhost;dbname=project1', "root", "");

$statement = $db->prepare("SELECT * FROM users WHERE name=:name AND password=:password");
$statement->execute(['name' => $name, 'password' => $password]);
$user =  $statement->fetch();

if ($user) {
    // Create payload for the JWT
    $payload = [
        'iss' => "localhost",  // Issuer
        'iat' => time(),       // Issued at
        'exp' => time() + (60 * 60),  // Expiration time (e.g., 1 hour)
        'user_id' => $user['id'],   // User ID
        'role_id' => $user['role_id'] // User role
    ];

    // Generate JWT token
    $jwt = JWT::encode($payload, $key, 'HS256');

    // Store the token in a cookie or return it as a response
    setcookie("jwt_token", $jwt, time() + (60 * 60), "/"); // Store token in cookie for 1 hour

    // Redirect based on role
    if ($user['role_id'] == 1){
        header("location: admin.php");
    } else {
        header("location: user.php");
    }

} else {
    header("location: index.php?incorrect=login");
}