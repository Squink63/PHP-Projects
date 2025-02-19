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
.card {
    width: 500px;
    margin: auto auto;
    top: -1000px;
    transition: 0.6s;
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
    $user = $_SESSION['user1'];
?>

<div class="sidebar">
  <a  href="admin.php">Home</a>
  <a href="user.php">Users</a>
  <a class="active" href="role.php">Role</a>
  <a  href="billings.php">Billings</a>
  <a  href="companies.php">Companies</a>
  <a  href="invoices.php">Suppliers</a>
  <?php if($user['role_id'] == 1) : ?>
    <a  href="per.php">Permissions</a>
  <?php endif ?>
</div>

<div class="backdrop"></div>


<div class="content">
    <nav class="navbar">
        <div class="container-fluid">
            <button id="addr" class="navbar-brand text-dark">Add Role</button>
            <a class="navbar-brand text-danger float-end" href="index.php">Log out</a>
        </div>
        </nav>

        <!-- As a heading -->
        
    </nav>

    <?php

      $db = new PDO('mysql:dbhost=localhost;dbname=project1', "root", "");
      $start = 0;
      $row_per_page = 5;
      $statement = $db->query("SELECT * FROM roles");
      $num_of_rows = $statement->rowCount();
      $pages =  ceil($num_of_rows / $row_per_page);

        if(isset($_GET['page-nr'])){
          $page = $_GET['page-nr'] - 1;
          $start = $page * $row_per_page;
        }
        $result = $db -> query("SELECT * FROM roles LIMIT $start, $row_per_page");
        $roles = $result -> fetchAll();
    ?>

    
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php foreach($roles as $role) : ?>
          <th scope="row"><?= $role['id'] ?></th>
          <td><?= $role['name'] ?></td>
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
    
  
    <div id="cr" class="card mb-3 mt-4" style="background: rgb(247, 250, 255);">
        <div class="card-body">
            <form action="addrole.php" method="post" class="mb-2">
                <label for="name">Name</label>
                <input type="text" class="form-control mb-2" name="name"  required>
                <label for="role">Role</label>
                <input type="text" class="form-control mb-2" name="role"  required>
                <button class="btn btn-primary w-100 my-4">Add Role</button>
            </form>
           
        </div>
    </div>
  
</div>

<script>

  document.querySelector("#addr").onclick = () =>{
    document.querySelector(".card").style.top = "0px";
    document.querySelector(".backdrop").style.display = "block";

  }

  document.querySelector(".backdrop").onclick = () => {
    document.querySelector(".card").style.top = "-1000px";
    document.querySelector(".backdrop").style.display = "none";
  }

</script>

</body>
</html>