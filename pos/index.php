<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>

        body {
            background: grey;
        }
        .container {
            border-radius: 5px;
            margin-top: 10%;
            padding: 15px;
        }
        
    </style>
</head>
<body>
    <div class="container text-center bg-white" style="max-width: 600px;">
        <h1 class="h3 my-4">Login</h1>


        <form action="login.php" method="post" class="mb-2">
            <input type="text" class="form-control mb-2" name="name" placeholder="Name" required>
            <input type="password" class="form-control mb-2" name="password" placeholder="Password" required>
            <button class="btn btn-primary w-100 my-4">Login</button>
        </form>
        <!-- <a href="register.php">Register</a> -->
    </div>
</body>
</html>