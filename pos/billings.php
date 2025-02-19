<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.min.css">
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

#cf {
  position: absolute;
    border-radius: 5px;
    margin-top: 10%;
    padding: 20px;
    background: #f1f1f1;
    width: 400px;
    margin-left: 30%;
    top: -1700px;
    transition: 0.5s;
}



#role {
  width: 200px;
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

.pg3 {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination3 li {
  border-top-color: #282828;
  border-bottom-color: #282828;
}
.pagination3 li:before,
.pagination3 .active:after,
.pagination3 .active:before,
.pagination3 .active ~ li:before {
  border-left-color: #282828;
  border-right-color: #282828;
}
.pagination3 a {
  color: #888;
  font-family: "Edmondsans";
  font-size: 15px;
  font-weight: bold;
  text-decoration: none;
}
.pagination3 .active a { color: #ccc;  }
.pagination3 .disabled a,
.pagination3 .disabled:hover a { color: #333; cursor: default;  }
.pagination3 li:hover a { color: #c9282d; }

/*
 * Basic style
 */
.pagination3 { text-align: center; }
.pagination3 ul {
  display: inline-block;
  list-style-type: none;
  margin: 0;
  padding: 0;
  text-align: center;
}
.pagination3 li {
  border-right:10px solid transparent;
  border-bottom-width: 17px;
  border-top-width: 17px;
  border-style: solid;
 
  transform:rotate(360deg);
  border-left: 0;
  height: 0;
  float: left;
  margin-right: 3px;
  position: relative;
}
.pagination3 li:before {
  border-bottom-color: transparent;
  border-left-color: transparent;
  border-top-color: transparent;
  border-width: 17px 10px 17px 0;
  border-style: solid;
  position: absolute;
  content: '';
  left: -10px;
  height: 0px;
  top: -17px;
  width: 0px;
}
.pagination3 .active ~ li:before {
  border-bottom-color: transparent;
  border-top-color: transparent;
  border-width: 17px 0 17px 10px;
  right: -10px;
  left: auto;
}
.pagination3 .active ~ li {
  border-left:10px solid transparent;
  border-right: 0;
}
.pagination3 .active  {
  border-right: 0;
  border-left: 0;
}
.pagination3 .active:after,
.pagination3 .active:before {
  border-bottom-color: transparent;
  border-top-color: transparent;
  border-width: 17px 10px 17px 0;
  border-style: solid;
  position: absolute;
  content: '';
  height: 0px;
  width: 0px;
  top: -17px;
  left: -10px;
}
.pagination3 .active:after {
  border-bottom-color: transparent;
  border-right-color: transparent;
  border-top-color: transparent;
  border-width: 17px 0 17px 10px;
  left: 100%;
}
.pagination3 a {
  line-height: 36px;
  margin-top: -17px;
  display: block;
  height: 34px;
  width: 30px;
}


</style>
</head>
<body>

<?php
    session_start();
    $user_in_s = $_SESSION['user1'];

    $db = new PDO('mysql:dbhost=localhost;dbname=project1', "root", "");  
    $result = $db -> query("SELECT * FROM roles");
    $roles = $result -> fetchAll();

    $selectedPermissions = [];

      // If a role is selected, fetch the saved permissions from the database
      if ($user_in_s['role'] == "User") {
          $stmt = $db->prepare("SELECT per FROM permission WHERE role = :role");
          $stmt->execute(['role' => "User"]);
          $selectedPermissions = $stmt->fetchAll(PDO::FETCH_COLUMN);
      } elseif ($user_in_s['role'] == "Manager") {
          $stmt = $db->prepare("SELECT per FROM permission WHERE role = :role");
          $stmt->execute(['role' => "Manager"]);
          $selectedPermissions = $stmt->fetchAll(PDO::FETCH_COLUMN);
      }
?>

<div class="sidebar">
   
  <a  href="admin.php">Home</a>
    <?php if( $user_in_s['role_id'] == 1 || in_array('ur', $selectedPermissions)) : ?>
        <a  href="user.php">Users</a>
    <?php endif ?>
  
    <?php if($user_in_s['role_id'] == 1) : ?>
        <a  href="role.php">Role</a>
    <?php endif ?>
    <?php if( $user_in_s['role_id'] == 1 || in_array('br', $selectedPermissions)) : ?>
        <a class="active" href="billings.php">Billings</a>
    <?php endif ?>
    
    <?php if( $user_in_s['role_id'] == 1 || in_array('cr', $selectedPermissions)) : ?>
        <a  href="companies.php">Companies</a>
    <?php endif ?>

    <?php if( $user_in_s['role_id'] == 1 || in_array('sr', $selectedPermissions)) : ?>
        <a  href="invoices.php">Suppliers</a>
    <?php endif ?>
  
  
    <?php if($user_in_s['role_id'] == 1) : ?>
        <a  href="per.php">Permissions</a>
    <?php endif ?>
  

  
</div>



<div class="content">
  <div class="backdrop"></div>
    <nav class="navbar">
        <div class="container-fluid">
            <?php if( $user_in_s['role_id'] == 1 || in_array('bc', $selectedPermissions)) : ?>
              <button id="addr" class="navbar-brand text-dark">Add Bill</button>
              <?php else : ?>
              <h4 class="text-white">Billings</h4>
            <?php endif ?>
            <a class="navbar-brand text-danger float-end" href="index.php">Log out</a>
        </div>
        
        
        <!-- As a heading -->
        
    </nav>


    <?php

      $db = new PDO('mysql:dbhost=localhost;dbname=project1', "root", "");
      $start = 0;
      $row_per_page = 5;
      $statement = $db->query("SELECT * FROM billing");
      $num_of_rows = $statement->rowCount();
      $pages =  ceil($num_of_rows / $row_per_page);

        if(isset($_GET['page-nr'])){
          $page = $_GET['page-nr'] - 1;
          $start = $page * $row_per_page;
        }
        $result = $db -> query("SELECT * FROM billing LIMIT $start, $row_per_page");
        $users = $result -> fetchAll();
    ?>

    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php foreach($users as $user) : ?>
          <th scope="row"><?= $user['name'] ?></th>
          <td><?= $user['price'] ?> Ks</td>
          <td>
            <div class="btn-group">
              <?php if( $user_in_s['role_id'] == 1 || in_array('bu', $selectedPermissions)) : ?>
                <a href="#" class="btn btn-sm btn-success me-3">Edit</a>
              <?php endif ?>

              <?php if( $user_in_s['role_id'] == 1 || in_array('bd', $selectedPermissions)) : ?>
                <a href="delbill.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
              <?php endif ?>
            </div>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
    <div class="pg3">
            <div class="pagination3">
                <ul>
                    
                    <!-- <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li> -->
                    <?php

                        for($counter = 1; $counter <= $pages; $counter ++){
                            ?>

                                <li>
                                    <a href="?page-nr=<?php echo $counter ?>"><?php echo $counter?></a>
                                </li>

                            <?php
                        }

                    ?>
                    
                </ul>
            </div>
    </div>
    
    
    <div id="cf" class="container p-3">
      <form action="addbill.php" method="post" id="fo">
              
              <div class="row mb-3">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" class="form-control" id="colFormLabelSm" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                  <input type="text" name="price" class="form-control" id="colFormLabelSm" required>
                </div>
              </div>


              
              <button class="btn btn-primary w-100 my-4">Add Bill</button>
      </form>
    </div>
    

</div>


<script>

  document.querySelector("#addr").onclick = () =>{
    document.querySelector("#cf").style.top = "10%";
    document.querySelector(".backdrop").style.display = "block";

  }

  document.querySelector(".backdrop").onclick = () => {
    document.querySelector("#cf").style.top = "-1700px";
    document.querySelector(".backdrop").style.display = "none";
  }

</script>

</body>
</html>