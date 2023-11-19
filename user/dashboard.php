<!--includes the essential and database-->
<?php
require('inc/essential.php');
require('inc/db_config.php');
userLogin(); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>User Dashboard</title> 

    <!--includes the bootstrap style-->
    <?php
    require('inc/links.php');
    ?>

    <!--includes specific CSS file-->
    <style>
        <?php
        require('css/common.css');
        ?>
    </style>
</head>
<body class="bg-light">
    <!--includes the nav bar-->
    <?php 
    require('inc/header.php');
    ?>

    <!--title-->
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p4 overflow-hidden">
                <br>

                
                <!-- Display a welcome message with the user's logged-in name if logged in -->
                    <?php
                    if (isset($_SESSION['userLogin']) && $_SESSION['userLogin']) {
                        echo '<h1 class="mb-4"><p>Welcome, ' . $_SESSION['user_name'] . '👋</p></h1>';
                    }
                    ?>

                <Br></Br>
                <!--list table-->
                <h4 class="mb-4">LATEST INQURIES</h4>
                <div class="table-responsive-md" style="height:auto; overflow-y: auto;">
                <table class="table table-hover border">
                        <thead>
                        <tr class="bg-dark text-light">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone No</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Messege</th>
                        <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>


                    <!--fetch data-->
                    <?php
                    	$q = "SELECT * FROM user_queries ORDER BY sr_no DESC LIMIT 1";
                        $data = @mysqli_query ($con, $q);

                        while($row=mysqli_fetch_assoc($data))

                                {
                                    echo '<tr>
                                    <td>'.$row['sr_no'].'</td>
                                    <td>'.$row['names'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td>'.$row['phone'].'</td>
                                    <td>'.$row['subjects'].'</td>
                                    <td>'.$row['messege'].'</td>
                                    <td>'.$row['status'].'</td>
                                    </tr>';
                                }

                                
                            
                    
                    ?>
                        
                    </tbody>
                    </table>
                </div>
                <Br></Br>

                <!--list table-->
                <h4 class="mb-4">LATEST BOOKING</h4>
                <div class="table-responsive-md" style="height:auto; overflow-y: auto;">
                <table class="table table-hover border">
                        <thead>
                        <tr class="bg-dark text-light">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Room Type</th>
                        <th scope="col">Date</th>
                        <th scope="col">Start Time</th>
                        <th scope="col">End Time</th>
                        <th scope="col">Booking Type</th>
                        <th scope="col">Total Student</th>
                        <th scope="col">Note</th>  
                        <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>


                    <!--fetch data-->
                    <?php
                    $q = "SELECT * FROM booking ORDER BY sr_no DESC LIMIT 1";
                        $data = @mysqli_query ($con, $q);

                        while($row=mysqli_fetch_assoc($data))
                        {
                            echo '<tr>
                            <td>'.$row['sr_no'].'</td>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row['room'].'</td>
                                    <td>'.$row['bookdate'].'</td>
                                    <td>'.$row['starttime'].'</td>
                                    <td>'.$row['endtime'].'</td>
                                    <td>'.$row['booktype'].'</td>
                                    <td>'.$row['total_student'].'</td>
                                    <td>'.$row['note'].'</td>
                                    <td>'.$row['status'].'</td>
                            </tr>';
                        }

                                
                            
                    
                    ?>
                        
                    </tbody>
                    </table>
                </div>
                <Br></Br>


                <!-- Add your user dashboard content here -->
            </div>
        </div>
    </div>

    <!--include script-->
    <?php
    require('inc/scripts.php');
    ?>
</body>
</html>
