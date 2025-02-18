<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers</title>
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

        #teachers {
            background: rgb(228, 233, 246);
            color: blue;
        }

        .content {
            margin-left: 270px;
            flex-grow: 1;
        }

        table td,
        table th {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            
        }

        thead th {
            color: #fff;
            
        }

        .card {
            border-radius: .5rem;
        }

        .table-scroll {
            border-radius: .5rem;
        }

        .table-scroll table thead th {
            font-size: 1.25rem;
        }
        thead {
            top: 0;
            position: sticky;
        }

        .pg2 {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination1{
            list-style: none;
            display: inline-block;
            padding: 0;
            margin-top: 10px;
            li{
                display: inline;
                text-align: center;
            }
            a{
                float: left;
                display: block;
                font-size: 14px;
                text-decoration: none;
                padding: 5px 12px;
                color:#fff;
                margin-left: -1px;
                border:1px solid transparent;
                line-height: 1.5;
                &.active{  cursor: default;}
                &:active{ outline: none;}
            }
        }

        .modal-4{
            a{
                margin:0 5px;
                padding: 0;
                width: 30px;
                height: 30px;
                line-height: 30px;
                border-radius : 100%;
                background-color: #F7C12C;
                &.prev{
                    border-radius: 50px 0 0 50px;
                width:100px;
                }
                &.next{
                border-radius: 0 50px 50px 0;
                width:100px;
                }
                &:hover{
                    background-color:#FFA500;
                }
                &.active, &:active{
                    background-color:#FFA100;
                }
            }
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
                <a href="stats.php" id="stats" class="nav-link py-3">
                    <img src="https://static-00.iconduck.com/assets.00/increase-stats-icon-2021x2048-87in2u2l.png" style="width: 30px; height: 30px" class="me-3">
                    Stats
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" id="teachers" class="nav-link py-3 text-dark">
                    <img src="https://cdn-icons-png.flaticon.com/512/10559/10559204.png" style="width: 30px; height: 30px" class="me-3">
                    Teachers
                </a>
            </li>
        </ul>
    </div>
         
    <div class="container-fluid content">

        <section class="intro">
            <div class="bg-image h-100" style="background-color: #f5f7fa;">
                <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px">
                            <table class="table table-striped mb-0">
                                <thead style="background-color: #002d72;">
                                <tr>
                                    <th  scope="col">Class name</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Hours</th>
                                    <th scope="col">Trainer</th>
                                    <th scope="col">Spots</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Like a butterfly</td>
                                    <td>Boxing</td>
                                    <td>9:00 AM - 11:00 AM</td>
                                    <td>Aaron Chapman</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>Mind &amp; Body</td>
                                    <td>Yoga</td>
                                    <td>8:00 AM - 9:00 AM</td>
                                    <td>Adam Stewart</td>
                                    <td>15</td>
                                </tr>
                                <tr>
                                    <td>Crit Cardio</td>
                                    <td>Gym</td>
                                    <td>9:00 AM - 10:00 AM</td>
                                    <td>Aaron Chapman</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>Wheel Pose Full Posture</td>
                                    <td>Yoga</td>
                                    <td>7:00 AM - 8:30 AM</td>
                                    <td>Donna Wilson</td>
                                    <td>15</td>
                                </tr>
                                <tr>
                                    <td>Playful Dancer's Flow</td>
                                    <td>Yoga</td>
                                    <td>8:00 AM - 9:00 AM</td>
                                    <td>Donna Wilson</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>Zumba Dance</td>
                                    <td>Dance</td>
                                    <td>5:00 PM - 7:00 PM</td>
                                    <td>Donna Wilson</td>
                                    <td>20</td>
                                </tr>
                                <tr>
                                    <td>Cardio Blast</td>
                                    <td>Gym</td>
                                    <td>5:00 PM - 7:00 PM</td>
                                    <td>Randy Porter</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>Pilates Reformer</td>
                                    <td>Gym</td>
                                    <td>8:00 AM - 9:00 AM</td>
                                    <td>Randy Porter</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>Supple Spine and Shoulders</td>
                                    <td>Yoga</td>
                                    <td>6:30 AM - 8:00 AM</td>
                                    <td>Randy Porter</td>
                                    <td>15</td>
                                </tr>
                                <tr>
                                    <td>Yoga for Divas</td>
                                    <td>Yoga</td>
                                    <td>9:00 AM - 11:00 AM</td>
                                    <td>Donna Wilson</td>
                                    <td>20</td>
                                </tr>
                                <tr>
                                    <td>Virtual Cycle</td>
                                    <td>Gym</td>
                                    <td>8:00 AM - 9:00 AM</td>
                                    <td>Randy Porter</td>
                                    <td>20</td>
                                </tr>
                                <tr>
                                    <td>Like a butterfly</td>
                                    <td>Boxing</td>
                                    <td>9:00 AM - 11:00 AM</td>
                                    <td>Aaron Chapman</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>Mind &amp; Body</td>
                                    <td>Yoga</td>
                                    <td>8:00 AM - 9:00 AM</td>
                                    <td>Adam Stewart</td>
                                    <td>15</td>
                                </tr>
                                <tr>
                                    <td>Crit Cardio</td>
                                    <td>Gym</td>
                                    <td>9:00 AM - 10:00 AM</td>
                                    <td>Aaron Chapman</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>Wheel Pose Full Posture</td>
                                    <td>Yoga</td>
                                    <td>7:00 AM - 8:30 AM</td>
                                    <td>Donna Wilson</td>
                                    <td>15</td>
                                </tr>
                                <tr>
                                    <td>Playful Dancer's Flow</td>
                                    <td>Yoga</td>
                                    <td>8:00 AM - 9:00 AM</td>
                                    <td>Donna Wilson</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>Zumba Dance</td>
                                    <td>Dance</td>
                                    <td>5:00 PM - 7:00 PM</td>
                                    <td>Donna Wilson</td>
                                    <td>20</td>
                                </tr>
                                <tr>
                                    <td>Cardio Blast</td>
                                    <td>Gym</td>
                                    <td>5:00 PM - 7:00 PM</td>
                                    <td>Randy Porter</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>Pilates Reformer</td>
                                    <td>Gym</td>
                                    <td>8:00 AM - 9:00 AM</td>
                                    <td>Randy Porter</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>Supple Spine and Shoulders</td>
                                    <td>Yoga</td>
                                    <td>6:30 AM - 8:00 AM</td>
                                    <td>Randy Porter</td>
                                    <td>15</td>
                                </tr>
                                <tr>
                                    <td>Yoga for Divas</td>
                                    <td>Yoga</td>
                                    <td>9:00 AM - 11:00 AM</td>
                                    <td>Donna Wilson</td>
                                    <td>20</td>
                                </tr>
                                <tr>
                                    <td>Virtual Cycle</td>
                                    <td>Gym</td>
                                    <td>8:00 AM - 9:00 AM</td>
                                    <td>Randy Porter</td>
                                    <td>20</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <div class="pg1">
                <ul class="pagination1 modal-4">
                    <li>
                        <!-- <a href="#" class="prev">
                        <i class="fa fa-chevron-left"></i>
                        Previous
                        </a> -->

                        <?php
                            if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){
                                ?>
                                    <a href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>" class="prev">Previous</a>
                                <?php    
                            }
                        ?>
                    </li>

                    <!-- <li><a href="#">1</a></li> -->
                    
                    <?php

                        for($counter = 1; $counter <= $pages; $counter ++){
                            ?>

                                <li>
                                    <a href="?page-nr=<?php echo $counter ?>"><?php echo $counter?></a>
                                </li>

                            <?php
                        }

                    ?>

                    <li>
                        
                        <?php
                            if(!isset($_GET['page-nr'])){
                                ?>
                                    <a href="?page-nr=2" class="next">Next</a>
                                <?php    
                            }else {
                                if($_GET['page-nr'] >= $pages){
                                    ?>
                                        <a class="next">Next</a>
                                    <?php
                                }else {
                                    ?>
                                        <a href="?page-nr=<?php echo $_GET['page-nr'] + 1?>" class="next">Next</a>
                                    <?php
                                }
                                
                            }
                        ?>
                    </li>
                </ul>
            </div>

        
            
        </div>
    
    </div>
                
    <script>

        

    </script>
</body>
</html>