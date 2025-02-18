<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <link rel="stylesheet" href="css/all.min.css">
    <script src="js/bootstrap.bundle.min.js" defer></script>



    <style>
        body {
            height: 100vh;
            background: white;
            display: flex;
            transition: 0.5s;
        }

        #sidebar li a {
            color: white;
        }
        #sidebar li a {
            border-top-left-radius: 25px;
            border-bottom-left-radius: 25px;
        }

        #sidebar li a:hover {
            background: rgb(228, 233, 246);
            color: black;
        }

        #students {
            background: rgb(228, 233, 246);
            color: blue;
        }

        .content {
            margin-left: 270px;
            flex-grow: 1;
        }

        table {
            width: 100%;
        }

        #backdrop {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: black;
            opacity: 0.5;
            display: none;

        }

        #modal_student {
            position: absolute;
            top: -500px;
            left: 30%;
            right: 30%;
            background: #ffffff;
            transition: 0.5s;
        }
        #modal_edit {
            position: absolute;
            top: -500px;
            left: 30%;
            right: 30%;
            background: #ffffff;
            transition: 0.5s;
        }
        #modal_delete {
            position: absolute;
            top: -500px;
            left: 30%;
            right: 30%;
            background: #ffffff;
            transition: 0.5s;
        }
        #modal_info {
            position: absolute;
            top: -500px;
            left: 35%;
            right: 35%;
            background: #ffffff;
            transition: 0.5s;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pg1 {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        
        .pg3 {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .page-numbers{
            display: inline-block;
            margin-top: 10px;
        }
        
        .pagination a {
            text-decoration: none;
            padding: 10px 15px;
            color: #007bff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .pagination a.active {
            background: #007bff;
            color: white;
        }
        .pagination .page-numbers a {
            text-decoration: none;
            padding: 10px 15px;
            color: #007bff;
            border: 1px solid #ddd;
            
            border-radius: 5px;
        }
        .pagination .page-numbers a.active {
            background-color: #007bff;
            color: white;
        }
        

        #myInput {
            background-image: url('/css/searchicon.png');
            background-position: 10px 12px;
            background-repeat: no-repeat;
            width: 100%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
            }

        #myUL {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: none;
        }

        #myUL li a {
        border: 1px solid #ddd;
        margin-top: -1px; /* Prevent double borders */
        background-color: #f6f6f6;
        padding: 12px;
        text-decoration: none;
        font-size: 18px;
        color: black;
        display: block
        }

        #myUL li a:hover:not(.header) {
        background-color: #eee;
        }

        

        

    .containerpg {
        display: inline-block;
        position: relative;
        
        }
    .index {
        cursor: pointer;
        display: inline;
        margin-right: 29.5px;
        padding: 5px;
        user-select: none;
        -moz-user-select: none;
    }
    .index:last-child {
        margin: 0;
    }
    svg {
        left: -13px;
        position: absolute;
        top: -11px;
        transition: transform 500ms;
        width: 46px;
    }
    path {
        fill:none;
        stroke:#2FB468;
        stroke-dasharray: 150 150;
        stroke-width:15;
    }
    .containerpg.open:not(.flip) path {
        animation: OpenRight 500ms;
    }
    .containerpg.open.flip path {
        animation: OpenLeft 500ms;
    }
    .containerpg.i1 svg {
        transform: translateX(0);
    }
    .containerpg.i2 svg {
        transform: translateX(50px);
    }
    .containerpg.i3 svg {
        transform: translateX(102px);
    }
    .containerpg.i4 svg {
        transform: translateX(154px);
    }
    .containerpg.i5 svg {
        transform: translateX(206px);
    }
    @keyframes OpenRight {
    25% { stroke-dasharray: 100 150; }
    60% { stroke-dasharray: 100 150; }
    100% { stroke-dasharray: 150 150; }
    }
    @keyframes OpenLeft {
    25% { stroke-dashoffset: -50px; }
    60% { stroke-dashoffset: -50px; }
    100% { stroke-dashoffset: 0; }
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
            $db = new PDO('mysql:dbhost=localhost;dbname=test', "root", "");

            $start = 0;
            $row_per_page = 5;
            $allstudents = $db -> query("SELECT * FROM students");
            $num_of_rows = $allstudents->rowCount();

             $pages =  ceil($num_of_rows / $row_per_page);

             if(isset($_GET['page-nr'])){
                $page = $_GET['page-nr'] - 1;
                $start = $page * $row_per_page;
             }
            
            $result = $db -> query("SELECT * FROM students LIMIT $start, $row_per_page");
            $students = $result -> fetchAll();
    ?>

    <div id="sidebar" class="d-flex flex-column vh-100" style="width: 270px; position: fixed; background: rgb(72, 94, 121)">
        <ul class="nav nav-flush flex-column ms-3 mt-3 mb-auto">
            <li class="logo ms-3"><img src="https://i.imgur.com/E26Pj54.png"></li>
            <li class="nav-item mb-2">
                <a href="#" id="students" class="nav-link py-3 text-dark">
                    <img src="https://cdn-icons-png.flaticon.com/512/354/354637.png" style="width: 30px; height: 30px" class="me-3">
                    Students
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="stats.php" class="nav-link py-3">
                    <img src="https://static-00.iconduck.com/assets.00/increase-stats-icon-2021x2048-87in2u2l.png" style="width: 30px; height: 30px" class="me-3">
                    Stats
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="teachers.php" id="teachers" class="nav-link py-3">
                    <img src="https://cdn-icons-png.flaticon.com/512/10559/10559204.png" style="width: 30px; height: 30px" class="me-3">
                    Teachers
                </a>
            </li>
        </ul>
    </div>
         
    <div class="container-fluid content">
        <div class="container-fluid mt-5 p-4" style="display: flex; background: rgb(72, 94, 121)">
            <h1 class="h3 text-white">Manage Student</h1>
            
            <div style="margin-left: 50px;">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for students.." title="Type in a name" >
                
                <ul id="myUL">
                    
                    
                    
                </ul>
            </div>
            <div style="right: 0; position: absolute; margin-right: 20px;">
                
                <button id="addStudent" class="btn btn-success">Add Student</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
            
                 <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php foreach($students as $student): ?>
                <tbody id="studentTableBody">
                    <tr>
                        <td>
                            <?= $student['name'] ?>
                        </td>
                        <td>
                            <?= $student['email'] ?>
                        </td>
                        <td>
                            <a href="#" class="info" data-name="<?= $student  ['name'] ?>" data-email="<?= $student['email'] ?>" data-phone="<?= $student['phone'] ?>" data-address="<?= $student['address'] ?>" data-department="<?= $student['department'] ?>">
                                <img src="https://cdn-icons-png.flaticon.com/512/301/301687.png" style="width: 20px; height: 20px">
                            </a>
                            <a href="#" class="edit" data-id="<?= $student['id'] ?>" data-name="<?= $student  ['name'] ?>" data-email="<?= $student['email'] ?>" data-phone="<?= $student['phone'] ?>" data-address="<?= $student['address'] ?>" data-department="<?= $student['department'] ?>">
                                <img src="https://icons.veryicon.com/png/o/miscellaneous/two-color-webpage-small-icon/edit-247.png" style="width: 20px; height: 20px">
                            </a>
                            <a href="#" class="delete" data-id="<?= $student['id'] ?>">
                                <img src="https://cdn-icons-png.flaticon.com/512/6861/6861362.png" style="width: 20px; height: 20px">
                            </a>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach ?>
            </table>
            
        </div>
        <div class="pagination" id="paginationControls">
            <a href="?page-nr=1">First</a>

            <?php
                if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){
                    ?>
                        <a href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>">Previous</a>
                    <?php    
                }else {
                    ?>
                        <a>Previous</a>
                    <?php
                }
            ?>

            <div class="page-numbers">

                <?php

                    for($counter = 1; $counter <= $pages; $counter ++){
                        ?>

                            <a href="?page-nr=<?php echo $counter ?>"><?php echo $counter?></a>

                        <?php
                    }

                ?>

            </div>

            <?php
                if(!isset($_GET['page-nr'])){
                    ?>
                        <a href="?page-nr=2">Next</a>
                    <?php    
                }else {
                    if($_GET['page-nr'] >= $pages){
                        ?>
                            <a>Next</a>
                        <?php
                    }else {
                        ?>
                            <a href="?page-nr=<?php echo $_GET['page-nr'] + 1?>">Next</a>
                        <?php
                    }
                    
                }
            ?>

            
            <a href="?page-nr=<?php echo $pages ?>">Last</a>

        </div>

        

        

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
        
    </div>

    <div id="backdrop"></div>
    <div id="modal_student" style="border-radius: 5px;">
        
        <div class="card mb-3 h-100" style="border-radius: 5px;">
            <div class="card-body">
    
                <div class="container text-center" style="border-radius: 5px;">

                    <div id="alert" class="alert alert-warning" style="display: none;">
                         Name already existed. 
                    </div>

                    <form action="upload.php" class="input-group mb-2" method="post" enctype="multipart/form-data">
                        
                        <button class="btn">
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" style="width: 60px; height: 60px; border-radius: 30px">
                        </button>
                    </form>
                    
             
                    <form action="add.php" method="post">
                        <input type="text" class="form-control mb-2"  name="name" placeholder="Name" required> <br>
                        <input type="text" class="form-control mb-2"  name="email" placeholder="Email" required> <br>
                        <input type="text" class="form-control mb-2"  name="phone" placeholder="Phone" required> <br>
                        <input type="text" class="form-control mb-2"  name="address" placeholder="Address" required> <br>
                        <input type="text" class="form-control mb-2"  name="department" placeholder="Department" required> <br>

                        <div style="flex: row;">
                        <button style="width: 150px; background: rgb(72, 94, 121);color: white">Add Student</button>
                        <span id="cancel" style="width: 150px; height: 30px; background: rgb(244, 154, 237);color: white; padding: 6px; margin-left: 15px; cursor: pointer">Cancel</span>
                        </div>
                        
                    </form>
                    
                        
                   
                </div>
                
            </div>
        </div>
       
    </div>

    <div id="modal_info" style="border-radius: 5px;">
        
        <div class="card mb-3 h-100" style="border-radius: 5px;">
            <div class="card-body">
        
                <div class="container text-center" style="border-radius: 5px;">

                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" style="width: 60px; height: 60px; border-radius: 30px">
                    

                    <div class="form-floating mb-3">

                            <textarea class="form-control" id="infoName" style="height: 50px" disabled>
                                
                            </textarea>
                            <label for="infoName">
                                Student Name
                            </label>
                    </div>
                    <div class="form-floating mb-3">

                        <textarea class="form-control" id="infoEmail" style="height: 50px" disabled>
                         
                        </textarea>
                            <label for="infoEmail">
                                Email
                            </label>
                        </div>
                    <div class="form-floating mb-3">

                            <textarea class="form-control" id="infoPhone" style="height: 50px" disabled>
                                
                            </textarea>
                            <label for="infoPhone">
                                Phone Number
                            </label>
                    </div>
                    <div class="form-floating mb-3">

                            <textarea class="form-control" id="infoAddress" style="height: 50px" disabled>
                                
                            </textarea>
                            <label for="infoAddress">
                                Address
                            </label>
                    </div>
                        <div class="form-floating mb-3">

                        <textarea class="form-control" id="infoDep" style="height: 50px" disabled>
                                
                            </textarea>
                            <label for="infoDep">
                                Department
                            </label>
                    </div>
                    
                </div>
                    
            </div>
        </div>
        
    </div>

    <div id="modal_delete" style="border-radius: 5px;">
        
        <div class="card mb-3 h-100" style="border-radius: 5px;">
            <div class="card-body">
    
                <div class="container text-center" style="border-radius: 5px;">

                    <div id="alert" class="alert alert-warning" style="display: none;">
                         Name already existed. 
                    </div>
             
                    <form action="delete.php" method="post">
                        <input type="hidden"  name="id" id="delId">
                        <Big>Are you sure to delete?</Big>
                        <div style="flex: row;">
                        <button style="width: 150px; background: red;color: white">Delete Student</button>
                        <span id="cancelEdit" style="width: 150px; height: 30px; background: rgb(244, 154, 237);color: white; padding: 6px; margin-left: 15px; cursor: pointer">Cancel</span>
                        </div>
                        
                    </form>
                    
                        
                   
                </div>
                
            </div>
        </div>
       
    </div>
    <div id="modal_edit" style="border-radius: 5px;">
        
        <div class="card mb-3 h-100" style="border-radius: 5px;">
            <div class="card-body">
    
                <div class="container text-center" style="border-radius: 5px;">

                    <div id="alert" class="alert alert-warning" style="display: none;">
                         Name already existed. 
                    </div>
             
                    <form action="edit.php" method="post">
                        <input type="hidden"  name="id" id="edtId">
                        <input type="text" class="form-control mb-2" id="edtName"  name="name" placeholder="Name" required> <br>
                        <input type="text" class="form-control mb-2" id="edtEmail"  name="email" placeholder="Email" required> <br>
                        <input type="text" class="form-control mb-2" id="edtPhone"  name="phone" placeholder="Phone" required> <br>
                        <input type="text" class="form-control mb-2" id="edtAddress"  name="address" placeholder="Address" required> <br>
                        <input type="text" class="form-control mb-2" id="edtDep"  name="department" placeholder="Department" required> <br>

                        <div style="flex: row;">
                        <button style="width: 150px; background: rgb(72, 94, 121);color: white">Edit Student</button>
                        <span id="cancelEdit" style="width: 150px; height: 30px; background: rgb(244, 154, 237);color: white; padding: 6px; margin-left: 15px; cursor: pointer">Cancel</span>
                        </div>
                        
                    </form>
                    
                        
                   
                </div>
                
            </div>
        </div>
       
    </div>

                    
   <script>

        document.addEventListener('DOMContentLoaded', function () {
            // Populate the student names in the list
            const students = <?= json_encode($students) ?>;
            const ul = document.getElementById('myUL');
            

            students.forEach(student => {
                const li = document.createElement('li');
                const a = document.createElement('a');
                a.href = '#';
                a.textContent = student.name;
                li.appendChild(a);
                ul.appendChild(li);
            });
        });

                    
        function myFunction() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName("li");
            // let ul = document.querySelector("#myUL");
            if (input.value != "") {
                document.querySelector("#myUL").style.display = "block";
            } else {
                document.querySelector("#myUL").style.display = "none";
            }
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                    
                } else {
                    li[i].style.display = "none";
                     
                }
            }
        }

        


        document.querySelector("#addStudent").onclick = show;
        document.querySelectorAll(".info").forEach(infoLink => {
            infoLink.onclick = function(event) {
                event.preventDefault();
                showInfo(this.dataset.name, this.dataset.email, this.dataset.phone, this.dataset.address, this.dataset.department);
            };
        });
        document.querySelectorAll(".edit").forEach(editLink => {
            editLink.onclick = function(event) {
                event.preventDefault();
                showEdit(this.dataset.id, this.dataset.name, this.dataset.email, this.dataset.phone, this.dataset.address, this.dataset.department);
            };
        });
        document.querySelectorAll(".delete").forEach(deleteLink => {
            deleteLink.onclick = function(event) {
                event.preventDefault();
                showDelete(this.dataset.id);
            };
        });
       
        document.querySelector("#backdrop").onclick = hide;
        document.querySelector("#cancel").onclick = hide;
        document.querySelector("#cancelEdit").onclick = hide;

        function show() {
        document.querySelector("#backdrop").style.display = "block";
        document.querySelector("#modal_student").style.top = "20%";
        
        }

        function showInfo(name, email, phone, address, department) {
            document.querySelector("#backdrop").style.display = "block";
            document.querySelector("#modal_info").style.top = "30%";
            document.querySelector("#infoName").value = name;
            document.querySelector("#infoEmail").value = email;
            document.querySelector("#infoPhone").value = phone;
            document.querySelector("#infoAddress").value = address;
            document.querySelector("#infoDep").value = department;
        }
        function showEdit(id, name, email, phone, address, department) {
            document.querySelector("#backdrop").style.display = "block";
            document.querySelector("#modal_edit").style.top = "20%";
            document.querySelector("#edtId").value = id;
            document.querySelector("#edtName").value = name;
            document.querySelector("#edtEmail").value = email;
            document.querySelector("#edtPhone").value = phone;
            document.querySelector("#edtAddress").value = address;
            document.querySelector("#edtDep").value = department;
        }
        function showDelete(id) {
            document.querySelector("#backdrop").style.display = "block";
            document.querySelector("#modal_delete").style.top = "30%";
            document.querySelector("#delId").value = id;
            
        }



        function hide() {
            document.querySelector("#backdrop").style.display = "none";
            document.querySelector("#modal_student").style.top = "-500px";
            document.querySelector("#modal_info").style.top = "-500px";
            document.querySelector("#modal_delete").style.top = "-500px";
            document.querySelector("#modal_edit").style.top = "-500px";
        }


        const rowsPerPage = 5;
        let currentPage = 1;

        

        // function myFunction() {
        //     // Declare variables
        //     const input = document.getElementById('myInput');
        //     const filter = input.value.toUpperCase();
        //     const ul = document.getElementById('myUL');
        //     const studentTableBody = document.getElementById('studentTableBody');
        //     const rows = studentTableBody.querySelectorAll('tr');

        //     // Clear previous search results
        //     ul.innerHTML = '';

        //     // Loop through all table rows and filter based on the search input
        //     rows.forEach(row => {
        //         const nameCell = row.cells[0];
        //         const nameText = nameCell.textContent || nameCell.innerText;
        //         if (nameText.toUpperCase().indexOf(filter) > -1) {
        //             const li = document.createElement('li');
        //             const a = document.createElement('a');
        //             a.href = '#';
        //             a.textContent = nameText;
        //             li.appendChild(a);
        //             ul.appendChild(li);
        //         }
        //     });
        // }

    const c = document.querySelector('.containerpg')
    const indexs = Array.from(document.querySelectorAll('.index'))
        let cur = -1
        indexs.forEach((index, i) => {
        index.addEventListener('click', (e) => {
            // clear
            c.className = 'containerpg'
            void c.offsetWidth; // Reflow
            c.classList.add('open')
            c.classList.add(`i${i + 1}`)
            if (cur > i) {
            c.classList.add('flip')
            }
            cur = i
        })
    })
    </script>
</body>
</html>