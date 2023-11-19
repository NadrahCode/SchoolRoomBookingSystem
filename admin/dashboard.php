
<!--includes the essenctial and database-->
<?php
require('inc/essential.php');
require('inc/db_config.php');
adminLogin();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="with=device-with, initial-scale=1.0">
    
	<title>Admin Panel - Dashboard</title>

<!--includes the bootstrap style-->
<?php
require('inc/links.php');
?>


<!--includes spesific css file-->
<style>
    <?php
require('css/common.css');
    ?>
</style>


</head>
<body class="bg-light">
<!--includes the nav bar-->
    <?php 
    require('inc/header.php')
    ?>


<!--title-->
<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p4 overflow-hidden">
            <br>
            <h1 class="mb-4">NEWEST LIST HERE📝</h1>
            <Br></Br>


            <!--list table-->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                <form action="adminFound.php" method="post">
                <h4 class="mb-4">LATEST ADMIN</h4>
                <div class="table-responsive-md" style="height:auto; overflow-y: auto;">
                <table class="table table-hover border">
                        <thead>
                        <tr class="bg-dark text-light">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone No</th>
                        <th scope="col" >Email</th>
                        </tr>
                    </thead>
                    <tbody>

                    


                    <!--fetch data-->
                    <?php
                    	$q = "SELECT * FROM admin_cred ORDER BY sr_no DESC LIMIT 1";
                        $data = @mysqli_query ($con, $q);

                        while($row=mysqli_fetch_assoc($data))

                                {
                                    echo '<tr>
                                    <td>'.$row['sr_no'].'</td>
                                    <td>'.$row['admin_name'].'</td>
                                    <td>'.$row['admin_phone'].'</td>
                                    <td>'.$row['admin_email'].'</td>
                                    </tr>';
                                }
                    ?>
                        
                    </tbody>
                    </table>
                </div>
                <Br></Br>

                <h4 class="mb-4">LATEST USER</h4>
                <div class="table-responsive-md" style="height:auto; overflow-y: auto;">
                <table class="table table-hover border">
                        <thead>
                        <tr class="bg-dark text-light">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone No</th>
                        <th scope="col" >Email</th>
                        </tr>
                    </thead>
                    <tbody>

                    


                    <!--fetch data-->
                    <?php
                    	$q = "SELECT * FROM user_cred ORDER BY sr_no DESC LIMIT 1";
                        $data = @mysqli_query ($con, $q);

                        while($row=mysqli_fetch_assoc($data))

                                {
                                    echo '<tr>
                                    <td>'.$row['sr_no'].'</td>
                                    <td>'.$row['user_name'].'</td>
                                    <td>'.$row['user_phone'].'</td>
                                    <td>'.$row['user_email'].'</td>
                                    </tr>';
                                }
                    ?>
                        
                    </tbody>
                    </table>
                </div>
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
                        <th scope="col"width="10%">Phone No</th>
                        <th scope="col" width="20%">Subject</th>
                        <th scope="col" width="30%">Messege</th>
                        <th scope="col" width="5%">Status</th>
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

                <!--list table-->
                <h4 class="mb-4">LATEST ROOM</h4>
                <div class="table-responsive-md" style="height:auto; overflow-y: auto;">
                <table class="table table-hover border">
                        <thead>
                        <tr class="bg-dark text-light">
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">description</th>
                        <th scope="col">equiptment</th>
                        </tr>
                    </thead>
                    <tbody>


                     <!--fetch data-->                   
                    <?php
                    	$q = "SELECT * FROM room ORDER BY id DESC LIMIT 1";
                        $data = @mysqli_query ($con, $q);

                        while($row=mysqli_fetch_assoc($data))
                        {
                            echo '<tr>
                            <td><img src="./uploaded_img/'.$row['image'].'" height="100" alt=""></td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['description'].'</td>
                            <td>'.$row['equiptment'].'</td>
                            </tr>';
                        }

                                
                            
                    
                    ?>
                        
                    </tbody>
                    </table>
                </div>
                <Br></Br>
                </div>
            </div>
        </div>
    </div>
</div>

<!--include script-->
    <?php
    require('inc/scripts.php');
    ?>


</body>
</html>