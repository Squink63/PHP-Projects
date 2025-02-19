<?php
// Logout page
setcookie("jwt_token", "", time() - 3600, "/");  // Delete the JWT cookie
header("location: index.php");