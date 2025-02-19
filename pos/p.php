<?php
// process_permissions.php

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve permissions data
    $permissions = $_POST['permissions'];

    // Loop through roles and permissions
    foreach ($permissions as $role => $actions) {
        echo "<h3>Permissions for $role:</h3>";
        foreach ($actions as $action => $value) {
            echo ucfirst($action) . ": " . ($value == 1 ? "Granted" : "Not Granted") . "<br>";
        }
        echo "<br>";
    }
} else {
    echo "No data received!";
}


?>
