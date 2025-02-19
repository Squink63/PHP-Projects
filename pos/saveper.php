<?php

$role = $_POST['role'];
$permissions = [];

    // Example for Users permissions
    if (isset($_POST['ur'])) {
        $permissions[] = 'ur';
    }
    if (isset($_POST['uc'])) {
        $permissions[] = 'uc';
    }
    if (isset($_POST['uu'])) {
        $permissions[] = 'uu';
    }
    if (isset($_POST['ud'])) {
        $permissions[] = 'ud';
    }

    // Example for Billings permissions
    if (isset($_POST['br'])) {
        $permissions[] = 'br';
    }
    if (isset($_POST['bc'])) {
        $permissions[] = 'bc';
    }
    if (isset($_POST['bu'])) {
        $permissions[] = 'bu';
    }
    if (isset($_POST['bd'])) {
        $permissions[] = 'bd';
    }
    // Example for Companies permissions
    if (isset($_POST['cr'])) {
        $permissions[] = 'cr';
    }
    if (isset($_POST['cc'])) {
        $permissions[] = 'cc';
    }
    if (isset($_POST['cu'])) {
        $permissions[] = 'cu';
    }
    if (isset($_POST['cd'])) {
        $permissions[] = 'cd';
    }
    // Example for Suppliers permissions
    if (isset($_POST['sr'])) {
        $permissions[] = 'sr';
    }
    if (isset($_POST['sc'])) {
        $permissions[] = 'sc';
    }
    if (isset($_POST['su'])) {
        $permissions[] = 'su';
    }
    if (isset($_POST['sd'])) {
        $permissions[] = 'sd';
    }

    $db = new PDO('mysql:dbhost=localhost;dbname=project1', "root", "");

    $statement = $db->prepare("INSERT IGNORE INTO permission (role, per) VALUES (:role, :per)");

    foreach ($permissions as $permission) {
        $statement->execute([
            'role' => $role,
            'per' => $permission,
        ]);
    }

    header("location: per.php");
    exit();


// echo $role, "<br>";
// echo $uc + $ud + $bc + $cc + $sc;