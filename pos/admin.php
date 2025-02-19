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
</style>
</head>
<body>

<?php
    session_start();
    $user_in_s = $_SESSION['user1'];

    $db = new PDO('mysql:dbhost=localhost;dbname=project1', "root", "");  

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
   
  <a class="active" href="index.php">Home</a>
    <?php if( $user_in_s['role_id'] == 1 || in_array('ur', $selectedPermissions)) : ?>
        <a href="user.php">Users</a>
    <?php endif ?>
  
    <?php if($user_in_s['role_id'] == 1) : ?>
        <a  href="role.php">Role</a>
    <?php endif ?>
    <?php if( $user_in_s['role_id'] == 1 || in_array('br', $selectedPermissions)) : ?>
        <a  href="billings.php">Billings</a>
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
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#"><?= $user['name'] ?></a>
            <a class="navbar-brand text-danger float-end" href="logout.php">Log out</a>

        </div>
        

        <!-- As a heading -->
        
    </nav>

    <div class="container-fluid m-3 p-3">

        <div class="row flex-column flex-lg-row  mt-3">
            
            <div  class="col mb-3 ">
                <div id="box1" class="bg-primary p-5">
                    <span class="text-success text-white">
                        Total Income
                    </span>
                    <h3 class="text-white">$ 579,000</h3>

                    <span class="text-success text-white">
                        saved 25%
                    </span>
                    
                </div>
            </div>
            <div class="col mb-3">
                <div id="box2" class="p-5" style="background: rgb(122, 197, 250);">
                    <span class="text-success text-white">
                        Total Expences
                    </span>
                    <h3 class="text-white">$ 79,000</h3>

                    <span class="text-success text-white">
                        saved 25%
                    </span>
                    
                </div>
            </div>
            
        </div>

        <div class="row flex-column flex-lg-row  mt-3">
            
            <div class="col mb-3">
                <div id="box3" class="p-5" style="background: rgb(157, 113, 206);">
                    <span class="text-success text-white">
                        Total Income
                    </span>
                    <h3 class="text-white">$ 92,000</h3>

                    <span class="text-success text-white">
                        saved 25%
                    </span>
                    
                </div>
            </div>
            <div class="col mb-3">
                <div id="box4" class="p-5" style="background: rgb(134, 209, 179);">
                    <span class="text-success text-white">
                        Total Income
                    </span>
                    <h3 class="text-white">$ 179,000</h3>

                    <span class="text-success text-white">
                        saved 65%
                    </span>
                    
                </div>
            </div>
            
        </div>

        <div class="row mt-4 flex-column flex-lg-row">
            <div class="col">
                
                <div class="card mb-3 mt-4">
                    <div class="card-body">
                        <span>AP and AR Balance</span>
                        <div></div>
                        <canvas id="lineChart" style="width:100%;max-width:600px"></canvas>
                    </div>
                </div>
            </div>


        </div>
        
        <div class="row mt-4 flex-column flex-lg-row">
            <div class="col">
                
                <div class="card mb-3 mt-4" style="background: rgb(247, 250, 255);">
                    <div class="card-body">
                        <span>EBIT (Earnings Before Interest & Tax)</span>
                        <div></div>
                        <canvas id="myChart" class="mt-4"></canvas>
                        
                        
                    </div>
                </div>
            </div>

            <div class="col">
            
                <div class="card mb-3 mt-4" >
                    <div class="card-body">
                        <span>
                            Cost of goods / Services
                            <small style="position: absolute; right: 0; margin-right: 10px;">1 Jan 2020 to 31 Dec 2020</small>
                            
                        </span>
                            

                        <canvas id="costChart" class="mt-4"></canvas>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4 flex-column flex-lg-row">
            <div class="col">
                
                <div class="card mb-3 mt-4" style="background: rgb(247, 250, 255);">
                    <div class="card-body">
                        <span>Disputed vs Overdue Invoices</span>
                        <div></div>
                        <canvas id="donutChart" class="mt-4"></canvas>
                        <div>
                            <ul>
                                <li style="color: rgba(220, 153, 208);">Disputed Invoices</li>
                                <li style="color: rgba(147, 224, 197);">Average</li>
                            </ul>
                        </div>
                        
                        
                    </div>
                </div>
            </div>

            <div class="col">
            
                <div class="card mb-3 mt-4" >
                    <div class="card-body">
                        <span>
                            Disputed vs Overdue Invoices
                        </span>
                            
                        <canvas id="multiChart" class="mt-4" ></canvas>
                        <div>
                            <ul>
                                <li style="color: blue;">30 Days</li>
                                <li style="color: yellow;">90 Days</li>
                
                            </ul>
                            
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col">
            
                <div class="card mb-3 mt-4" >
                    <div class="card-body">
                        <span>
                            Disputed vs Overdue Invoices
                        </span>
                            
                        <canvas id="pieChart" class="mt-4" ></canvas>
                        <div>
                            <ul>
                                <li style="color: blue;">30 Days</li>
                                <li style="color: yellow;">90 Days</li>
                
                            </ul>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</div>

<script>


        var ctx = document.getElementById("myChart"); 
        var myChart = new Chart(ctx, { 
        type: 'bar', 
        data: { 
            labels: ["2019 Q1", "2019 Q2" , "2019 Q3" , "2019 Q4", "2019 Q5", "2019 Q6"], 
            datasets: [ 
            { label: 'Paid:', 
                data: [20,40,15,35,25,50], 
            
                backgroundColor :"blue",
                barPercentage: 0.4
        
         
            } 
            ] 
        }, 
        options: {
            legend: {display: false},
            scales: {
                yAxes: [{
                    ticks: {
                    beginAtZero: true,
                    max: 90
                    
                    }
                }],
                xAxes: [{
                    categoryPercentage: 0.5 // Adjust this value to change the space between the bars (0.0 to 1.0)
                }]
            }
        },
        
        }
    ); 


        var ctx = document.getElementById("costChart"); 
        var myChart = new Chart(ctx, { 
        type: 'bar', 
        data: { 
            labels: ["2019 Q1", "2019 Q2" , "2019 Q3" , "2019 Q4", "2019 Q5", "2019 Q6"], 
            datasets: [ 
            { label: 'Paid:', 
                data: [20,40,15,35,25,50], 
                backgroundColor : "rgb(157, 113, 206)",
                barPercentage: 0.5
        
        
            } 
            ] 
        }, 
        options: {
            legend: {display: false},
            scales: {
                yAxes: [{
                    ticks: {
                    beginAtZero: true,
                    max: 90
                    
                    }
                }],
                xAxes: [{
                    categoryPercentage: 0.5 // Adjust this value to change the space between the bars (0.0 to 1.0)
                }]
            }
        },
        
        
        
        }); 

        var ctx = document.getElementById("lineChart"); 
        var hart = new Chart(ctx, { 
        type: 'line', 
        data: { 
            labels: ["2019 Q1", "2019 Q2" , "2019 Q3" , "2019 Q4", "2019 Q5", "2019 Q6"], 
            datasets: [{
                label: 'Paid:', 
                lineTension: 0,
                fill: false,
                data: [20,40,15,35,25,50], 
                backgroundColor : "rgb(157, 113, 206)",
                barPercentage: 0.5
        
        
            } 
            ] 
        }, 
        options: {
            legend: {display: false},
            scales: {
                yAxes: [{
                    ticks: {
                    beginAtZero: true,
                    max: 90
                    
                    }
                }],
                xAxes: [{
                    categoryPercentage: 0.5 // Adjust this value to change the space between the bars (0.0 to 1.0)
                }]
            }
        },
        }); 

        var ctx = document.getElementById("donutChart"); 
        var myChart = new Chart(ctx, { 
        type: 'doughnut', 
        data: { 
            labels: ["2019 Q1", "2019 Q2" , "2019 Q3" , "2019 Q4", "2019 Q5", "2019 Q6"], 
            datasets: [ 
            { label: 'Paid:', 
                data: [45,25], 
            
                backgroundColor :['rgba(220, 153, 208)', 
                'rgba(147, 224, 197)',],
                barPercentage: 0.4
        
         
            } 
            ] 
        }, 
        options: {
            legend: {display: false},
            
        },
        
        }
    ); 


        var ctx = document.getElementById("pieChart"); 
        var myChart = new Chart(ctx, { 
        type: 'pie', 
        data: { 
            labels: ["2019 Q1", "2019 Q2" , "2019 Q3" , "2019 Q4", "2019 Q5", "2019 Q6"], 
            datasets: [ 
            { label: 'Paid:', 
                data: [45,25, 37,33,12 ], 
                backgroundColor : ["blue", "pink","teal","red","yellow"],
                barPercentage: 0.5
        
        
            } 
            ] 
        }, 
        options: {
            legend: {display: false},
            responsive: true,
            
        },
        }); 


        var ctx = document.getElementById("multiChart"); 
        var myChart = new Chart(ctx, { 
        type: 'line', 
        data: { 
            labels: ["2014", "2015" , "2016" , "2017", "2018", "2019", "2020"], 
            datasets: [ 
            { label: 'Paid:', 
                data: [40,20,40,20,40,20,40], 
            
                backgroundColor :"blue",
                borderColor: "blue",
                fill: false
        
         
            } ,
            { 
                data: [30,50,30,50,80,50,90],
                borderColor: "green",
                fill: false
            },
            ] 
        }, 
        options: {
            legend: {display: false},
            scales: {
                yAxes: [{
                    ticks: {
                    beginAtZero: true,
                    max: 160
                    
                    }
                }],
                xAxes: [{
                    categoryPercentage: 0.5 // Adjust this value to change the space between the bars (0.0 to 1.0)
                }]
            }
        },
        
        }
    ); 

    </script>

</body>
</html>