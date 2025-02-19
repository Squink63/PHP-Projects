<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/all.min.css">


<script src="js/bootstrap.bundle.min.js" defer></script>

<script src= 
"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> 
</script>
<script>
        
        function handleRoleChange() {
            var role = document.getElementById('role').value;
            var checkboxes = document.querySelectorAll('.form-check-input');
            
            
            // Check if the selected role is 'admin'
            if (role === 'Admin' || role === ''|| role === 'Role') {
                checkboxes.forEach(function(checkbox) {
                    checkbox.disabled = true;
                    // checkbox.checked = true;
                    document.querySelector("#save").style.visibility = "hidden";
                });
            } else {
                checkboxes.forEach(function(checkbox) {
                    checkbox.disabled = false;
                    document.querySelector("#save").style.visibility = "visible";
                }
            );
            }
        }

        function sendData() {
            var role = document.getElementById('role').value;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '', true); // Post to the same file
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the content of the div with the response from PHP
                    document.getElementById('result').innerHTML = xhr.responseText;
                }
            };
            xhr.send('role=' + encodeURIComponent(role));
        }

        window.onload = function() {
            document.getElementById('role').addEventListener('change', sendData);
        };
</script>


<style>

    

    body {
    margin: 0;
    font-family: "Lato", sans-serif;
    }

    .sidebar {
    margin: 0;
    padding: 0;
    width: 200px;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
    }

    .sidebar a {
    display: block;
    color: black;
    padding: 16px;
    text-decoration: none;
    margin-top: 5px;
    }
    
    .sidebar a.active {
    background-color: rgb(107, 64, 241);
    color: white;
    }

    .sidebar a:hover:not(.active) {
    background-color: rgb(107, 64, 241);
    color: white;
    }

    div.content {
    margin-left: 200px;
    padding: 1px 16px;
    height: 1000px;
    }

    .navbar {
        background-color: rgb(107, 64, 241);
    }

    @media screen and (max-width: 700px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
    }
    .sidebar a {float: left;}
    div.content {margin-left: 0;}
    }

    @media screen and (max-width: 400px) {
    .sidebar a {
        text-align: center;
        float: none;
    }
    }
    

    tr, th, td {
        color: red;
    }

    #save {
        visibility: hidden;
    }

    #per_t {
        position: absolute;
        top: -1700px;
        transition: 0.5s;
        width: 50%;
        justify-content: center;
        left: 30%;
        
    }

    img {
        width: 30px;
        height: 30px;
    }





.backdrop {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: black;
    opacity: 0.5;
    display: none;

}
</style>
</head>
<body>

<?php

  $db = new PDO('mysql:dbhost=localhost;dbname=project1', "root", "");  
  $result = $db -> query("SELECT * FROM roles");
  $roles = $result -> fetchAll();
  // Assuming you have connected to your database
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role_f_s = isset($_POST['role']) ? $_POST['role'] : '';
    // Process the role value
    
    } // Get selected role from previous form submission or default

    // Initialize an empty array for permissions
    $selectedPermissions = [];
    $selectedPermissionsForUser = [];
    $selectedPermissionsForManager = [];

    // If a role is selected, fetch the saved permissions from the database
    if ($role_f_s) {
        $stmt = $db->prepare("SELECT per FROM permission WHERE role = :role");
        $stmt->execute(['role' => $role_f_s]);
        $selectedPermissions = $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    $stmt1 = $db->prepare("SELECT per FROM permission WHERE role = :role");
    $stmt1->execute(['role' => "User"]);
    $selectedPermissionsForUser = $stmt1->fetchAll(PDO::FETCH_COLUMN);

    $stmt2 = $db->prepare("SELECT per FROM permission WHERE role = :role");
    $stmt2->execute(['role' => "Manager"]);
    $selectedPermissionsForManager = $stmt2->fetchAll(PDO::FETCH_COLUMN);

    

?>

<div class="sidebar">
  <a href="admin.php">Home</a>
  <a href="user.php">Users</a>
  <a  href="role.php">Role</a>
  <a  href="billings.php">Billings</a>
  <a  href="companies.php">Companies</a>
  <a  href="invoices.php">Suppliers</a>
  <a class="active" href="per.php">Permissions</a>

  
</div>



<div class="content">
    <div class="backdrop"></div>
    <nav class="navbar">
        <div class="container-fluid">
            <button id="addr" class="navbar-brand text-dark">Create permission</button>
            <a class="navbar-brand text-danger float-end" href="index.php">Log out</a>

        </div>

    </nav>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Role</th>
          <th></th>
          <th scope="col">Users</th>
          <th scope="col">Billings</th>
          <th scope="col">Companies</th>
          <th scope="col">Suppliers</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>User</td>
            <td></td>
            <td>
                <?php if(in_array('ur', $selectedPermissionsForUser)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/9135/9135771.png">
                <?php endif ?>
                <?php if(in_array('uc', $selectedPermissionsForUser)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/1022/1022493.png">
                <?php endif ?>
                <?php if(in_array('uu', $selectedPermissionsForUser)) : ?>
                    <img src="https://cdn-icons-png.freepik.com/256/5625/5625789.png?semt=ais_hybrid">
                <?php endif ?>
                <?php if(in_array('ud', $selectedPermissionsForUser)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/7718/7718788.png">
                <?php endif ?>
                
            </td>
            <td>
                <?php if(in_array('br', $selectedPermissionsForUser)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/9135/9135771.png">
                <?php endif ?>
                <?php if(in_array('bc', $selectedPermissionsForUser)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/1022/1022493.png">
                <?php endif ?>
                <?php if(in_array('bu', $selectedPermissionsForUser)) : ?>
                    <img src="https://cdn-icons-png.freepik.com/256/5625/5625789.png?semt=ais_hybrid">
                <?php endif ?>
                <?php if(in_array('bd', $selectedPermissionsForUser)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/7718/7718788.png">
                <?php endif ?>
            </td>
            <td>
                <?php if(in_array('cr', $selectedPermissionsForUser)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/9135/9135771.png">
                <?php endif ?>
                <?php if(in_array('cc', $selectedPermissionsForUser)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/1022/1022493.png">
                <?php endif ?>
                <?php if(in_array('cu', $selectedPermissionsForUser)) : ?>
                    <img src="https://cdn-icons-png.freepik.com/256/5625/5625789.png?semt=ais_hybrid">
                <?php endif ?>
                <?php if(in_array('cd', $selectedPermissionsForUser)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/7718/7718788.png">
                <?php endif ?>
            </td>
            <td>
                <?php if(in_array('sr', $selectedPermissionsForUser)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/9135/9135771.png">
                <?php endif ?>
                <?php if(in_array('sc', $selectedPermissionsForUser)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/1022/1022493.png">
                <?php endif ?>
                <?php if(in_array('su', $selectedPermissionsForUser)) : ?>
                    <img src="https://cdn-icons-png.freepik.com/256/5625/5625789.png?semt=ais_hybrid">
                <?php endif ?>
                <?php if(in_array('sd', $selectedPermissionsForUser)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/7718/7718788.png">
                <?php endif ?>
            </td>
          
        </tr>
        <tr>
            <td>Manager</td>
            <td></td>
            <td>
                <?php if(in_array('ur', $selectedPermissionsForManager)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/9135/9135771.png">
                <?php endif ?>
                <?php if(in_array('uc', $selectedPermissionsForManager)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/1022/1022493.png">
                <?php endif ?>
                <?php if(in_array('uu', $selectedPermissionsForManager)) : ?>
                    <img src="https://cdn-icons-png.freepik.com/256/5625/5625789.png?semt=ais_hybrid">
                <?php endif ?>
                <?php if(in_array('ud', $selectedPermissionsForManager)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/7718/7718788.png">
                <?php endif ?>
            </td>
            <td>
            <?php if(in_array('br', $selectedPermissionsForManager)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/9135/9135771.png">
                <?php endif ?>
                <?php if(in_array('bc', $selectedPermissionsForManager)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/1022/1022493.png">
                <?php endif ?>
                <?php if(in_array('bu', $selectedPermissionsForManager)) : ?>
                    <img src="https://cdn-icons-png.freepik.com/256/5625/5625789.png?semt=ais_hybrid">
                <?php endif ?>
                <?php if(in_array('bd', $selectedPermissionsForManager)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/7718/7718788.png">
                <?php endif ?>
            </td>
            <td>
            <?php if(in_array('cr', $selectedPermissionsForManager)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/9135/9135771.png">
                <?php endif ?>
                <?php if(in_array('cc', $selectedPermissionsForManager)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/1022/1022493.png">
                <?php endif ?>
                <?php if(in_array('cu', $selectedPermissionsForManager)) : ?>
                    <img src="https://cdn-icons-png.freepik.com/256/5625/5625789.png?semt=ais_hybrid">
                <?php endif ?>
                <?php if(in_array('cd', $selectedPermissionsForManager)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/7718/7718788.png">
                <?php endif ?>
            </td>
            <td>
            <?php if(in_array('sr', $selectedPermissionsForManager)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/9135/9135771.png">
                <?php endif ?>
                <?php if(in_array('sc', $selectedPermissionsForManager)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/1022/1022493.png">
                <?php endif ?>
                <?php if(in_array('su', $selectedPermissionsForManager)) : ?>
                    <img src="https://cdn-icons-png.freepik.com/256/5625/5625789.png?semt=ais_hybrid">
                <?php endif ?>
                <?php if(in_array('sd', $selectedPermissionsForManager)) : ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/7718/7718788.png">
                <?php endif ?>
            </td>
          
        </tr>
        
      </tbody>
    </table>

    <div id="per_t" class="col">
                
        <div class="card mb-3 mt-4" style="background: rgb(255, 255, 255);">
            <div class="card-body">
                <h5>
                    Role & Permission
                </h5>
                <div></div>

                <form action="saveper.php" class="form-check" method="POST">
                    <select class="float-end" name="role" id="role" onchange="handleRoleChange(), sendData()">
                        <option>Role</option>  
                      <?php foreach($roles as $role): ?>
                        <option><?= $role['name'] ?></option>
                      <?php endforeach ?>
                    </select>
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Read</th>
                            <th>Create</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Users</td>
                            <td>
                                <input type="checkbox" class="form-check-input ms-3" name="ur" value="ur" <?php if(in_array('ur', $selectedPermissions)) : ?>
                                    checked 
                                <?php endif ?>
                                    >
                            </td>
                            <td>
                                <input type="checkbox" class="form-check-input ms-3" name="uc" value="uc" <?= in_array('uc', $selectedPermissions) ? 'checked' : '' ?>>
                            </td>
                            <td>
                                <input type="checkbox" class="form-check-input ms-3" name="uu" value="uu" <?= in_array('uu', $selectedPermissions) ? 'checked' : '' ?>>
                            </td>
                            <td>
                                <input type="checkbox" class="form-check-input ms-3" name="ud" value="ud" <?= in_array('ud', $selectedPermissions) ? 'checked' : '' ?>>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>Billings</td>
                            <td>
                                <input type="checkbox" class="form-check-input ms-3" name="br" value="br" <?= in_array('br', $selectedPermissions) ? 'checked' : '' ?>>
                            </td>
                            <td>
                                <input type="checkbox" class="form-check-input ms-3" name="bc" value="bc" <?= in_array('bc', $selectedPermissions) ? 'checked' : '' ?>>
                            </td>
                            <td>
                                <input type="checkbox" class="form-check-input ms-3" name="bu" value="bu" <?= in_array('bu', $selectedPermissions) ? 'checked' : '' ?>>
                            </td>
                            <td>
                                <input type="checkbox" class="form-check-input ms-3" name="bd" value="bd" <?= in_array('bd', $selectedPermissions) ? 'checked' : '' ?>>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>Companies</td>
                            <td>
                                <input type="checkbox" class="form-check-input ms-3" name="cr" value="cr" <?= in_array('cr', $selectedPermissions) ? 'checked' : '' ?>>
                            </td>
                            <td>
                                <input type="checkbox" class="form-check-input ms-3" name="cc" value="cc" <?= in_array('cc', $selectedPermissions) ? 'checked' : '' ?>>
                            </td>
                            <td>
                                <input type="checkbox" class="form-check-input ms-3" name="cu" value="cu" <?= in_array('cu', $selectedPermissions) ? 'checked' : '' ?>>
                            </td>
                            <td>
                                <input type="checkbox" class="form-check-input ms-3" name="cd" value="cd" <?= in_array('cd', $selectedPermissions) ? 'checked' : '' ?>>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>Suppliers</td>
                            <td>
                                <input type="checkbox" class="form-check-input ms-3" name="sr" value="sr" <?= in_array('sr', $selectedPermissions) ? 'checked' : '' ?>>
                            </td>
                            <td>
                                <input type="checkbox" class="form-check-input ms-3" name="sc" value="sc" <?= in_array('sc', $selectedPermissions) ? 'checked' : '' ?>>
                            </td>
                            <td>
                                <input type="checkbox" class="form-check-input ms-3" name="su" value="su" <?= in_array('su', $selectedPermissions) ? 'checked' : '' ?>>
                            </td>
                            <td>
                                <input type="checkbox" class="form-check-input ms-3" name="sd" value="sd" <?= in_array('sd', $selectedPermissions) ? 'checked' : '' ?>>
                            </td>
                            
                        </tr>
                        
                        </tbody>
                    </table>
                    <button id="save" type="submit" class="btn btn-primary mt-3" style="margin-left: 300px;">Save</button>
                </form>
                
                
                
            </div>
        </div>
    </div>
    
  
</div>

<script>

  document.querySelector("#addr").onclick = () =>{
    document.querySelector("#per_t").style.top = "10%";
    document.querySelector(".backdrop").style.display = "block";

  }

  document.querySelector(".backdrop").onclick = () => {
    document.querySelector("#per_t").style.top = "-1700px";
    document.querySelector(".backdrop").style.display = "none";
  }

</script>



</body>
</html>