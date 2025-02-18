<?php 
    include("vendor/autoload.php");

    use Helpers\Auth;

    $auth = Auth::check();

    // session_start();
    // if (!isset($_SESSION["user"])) {
    //     header("location: index.php");
    //     exit();
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        
    </style>
</head>
<body>
    <div class="container mt-4 mb-3" style="max-width: 600px;">

        <h1 class="h3">Profile</h1>

        <?php if ($auth->photo) : ?>
            <img src="_actions/photos/<?= $auth->photo ?>" width="300" class="img-thumbnail">
        <?php endif ?>


        <form action="_actions/upload.php" class="input-group mb-2" method="post" enctype="multipart/form-data">
            <input type="file" name="photo" class="form-control">
            <button class="btn btn-secondary">Upload</button>
        </form>

        <ul class="list-group mt-4 mb-3">
            <li class="list-group-item">Name: <?= $auth->name ?></li>
            <li class="list-group-item">Email: <?= $auth->email ?></li>
            <li class="list-group-item">Phone: <?= $auth->phone ?></li>
            <li class="list-group-item">Address: <?= $auth->address ?></li>
        </ul>
        
        <a href="admin.php">Admin</a>
        <a href="_actions/logout.php" class="text-danger" >Logout</a>
    </div>
</body>
</html>