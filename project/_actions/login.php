<?php

include("../vendor/autoload.php");
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$email = $_POST["email"];
$password = $_POST["password"];

$table = new UsersTable(new MySQL);
$user = $table->find($email, $password);

if ($user) {
    if($user->suspended) {
        HTTP::redirect("/index.php", "suspended=account");
    }
    session_start();

    $_SESSION['user'] = $user;
    HTTP::redirect("/profile.php");
} else {
    HTTP::redirect("/index.php", "incorrect=login");
}


// if ($email == "alice@gmail.com" and $password = "password" ) {
//     session_start();

//     $_SESSION["user"] = ["name" => "Alex"];
//     header("location: ../profile.php");
    

// } else {
//     header("location: ../index.php?incorrect=login");
// }