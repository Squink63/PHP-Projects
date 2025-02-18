<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stats</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <link rel="stylesheet" href="css/all.min.css">
    <script src="js/bootstrap.bundle.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



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

        #stats {
            background: rgb(228, 233, 246);
            color: blue;
        }

        .content {
            margin-left: 270px;
            flex-grow: 1;
        }

        #city {
            
            width: 700px;
            height: 100%;
            
        }
        #dep {
            
            width: 350px;
            height: 100%;
            
        }
        #city1 {
            
            width: 700px;
            height: 100%;
            
        }
        #dep1 {
            
            width: 350px;
            height: 100%;
            
        }

        .wrap {
            width: 100%;
            display: flex;
            height: 700px;
            justify-content: space-around;
        }

        
    </style>
</head>
<body>
    <?php
            $db = new PDO('mysql:dbhost=localhost;dbname=test', "root", "");
            
            $result = $db -> query("SELECT * FROM students");
            $students = $result -> fetchAll();
    ?>

    <div id="sidebar" class="d-flex flex-column vh-100" style="width: 270px; position: fixed; background: rgb(72, 94, 121)">
        <ul class="nav nav-flush flex-column ms-3 mt-3 mb-auto">
            <li class="logo ms-3"><img src="https://i.imgur.com/E26Pj54.png"></li>
            <li class="nav-item mb-2">
                <a href="index.php" id="students" class="nav-link py-3 ">
                    <img src="https://cdn-icons-png.flaticon.com/512/354/354637.png" style="width: 30px; height: 30px" class="me-3">
                    Students
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" id="stats" class="nav-link py-3 text-dark">
                    <img src="https://static-00.iconduck.com/assets.00/increase-stats-icon-2021x2048-87in2u2l.png" style="width: 30px; height: 30px" class="me-3">
                    Stats
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="teachers.php" id="teachers" class="nav-link py-3 ">
                    <img src="https://cdn-icons-png.flaticon.com/512/10559/10559204.png" style="width: 30px; height: 30px" class="me-3">
                    Teachers
                </a>
            </li>
        </ul>
    </div>
         
    <div class="container-fluid content">

        <div class="wrap" style="display: flex;">

            <div>
            <canvas id="city"></canvas>
            </div>
            <div>
            <canvas id="dep"></canvas>
            </div>

        </div>

        <div class="wrap" style="display: flex;">

            <div>
            <canvas id="city1"></canvas>
            </div>
            <div>
            <canvas id="dep1"></canvas>
            </div>

        </div>

        
       
        
    </div>
    <div class="container-fluid content">


        <div class="wrap" style="display: flex;">

            <div>
            <canvas id="city1"></canvas>
            </div>
            <div>
            <canvas id="dep1"></canvas>
            </div>

        </div>

        
    </div>
                
   <script>

        const students = <?= json_encode($students) ?>;
        
        const stads = [...new Set(students.map(student => student.address))];
        const stmjs = [...new Set(students.map(student => student.department))];

        let mdy = students.filter(student => student.address == "Mandalay");
        let ygn = students.filter(student => student.address == "Yangon");
        let npt = students.filter(student => student.address == "Nay Pyi Taw");
        let tg = students.filter(student => student.address == "Taung Gyi");
        let bg = students.filter(student => student.address == "Bago");
        let pol = students.filter(student => student.address == "Pyin Oo Lwin");

        let mech = students.filter(student => student.department == "MECH");
        let it = students.filter(student => student.department == "IT");
        let ep = students.filter(student => student.department == "EP");
        let ec = students.filter(student => student.department == "EC");
        let cv = students.filter(student => student.department == "Civil");
        let mc = students.filter(student => student.department == "MC");

        const addressCount = students.reduce((acc, student) => {
            const address = student.address;
            acc[address] = (acc[address] || 0) + 1;
            return acc;
        }, {});
        const dpCount = students.reduce((acc, student) => {
            const dp = student.department;
            acc[dp] = (acc[dp] || 0) + 1;
            return acc;
        }, {});

        console.log(stmjs);

        



        const ctx = document.getElementById('city');

        new Chart(ctx, {
        type: 'bar',
        data: {
            labels: stads,
            datasets: [{
            label: '# of Students',
            data: addressCount,
            borderWidth: 1
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
        });

        const ctx1 = document.getElementById('dep');

        new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: stmjs,
            datasets: [{
            label: '# of Students',
            data: [it.lenght, ep.length, mech.length, ec.length, cv.length, mc.length],
            borderWidth: 1
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
        });

        const ctx2 = document.getElementById('city1');

        new Chart(ctx2, {
        type: 'line',
        data: {
            labels: stads,
            datasets: [{
            label: '# of Students',
            data: addressCount,
            borderWidth: 1
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
        });

        const ctx3 = document.getElementById('dep1');

        new Chart(ctx3, {
        type: 'doughnut',
        data: {
            labels: stmjs,
            datasets: [{
            label: '# of Students',
            data: [it.lenght, ep.length, mech.length, ec.length, cv.length, mc.length],
            borderWidth: 1
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
        });

    </script>
</body>
</html>