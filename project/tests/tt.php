<?php



$password = "password";
// $hash = md5($password);
// echo md5($password), "<br>";
// echo md5(md5($password));
$hash = password_hash($password, PASSWORD_DEFAULT);
echo $hash, "<br>";
if(password_verify("Apple", $hash)) {
    echo "Correct";
} else {
    echo "Incorrect";
}