
<!--include essential and database file-->
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
	<meta name="viewport" content="with=device-with, initial-scale=1.0">
	<title>User Panel - Settings</title>


<!--include links file-->
<?php
require('inc/links.php');
?>


<!--include spesific css file-->
<style>
    <?php
require('css/common.css');
    ?>
</style>


</head>
<body class="bg-light">

<!--include header file-->
<?php 
    require('inc/header.php')
?>

<!--title-->
<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p4 overflow-hidden">
            <br>
            <h1 class="mb-4">USER BOOKINGS LIST</h1>
            <?php
            $q = "SELECT * FROM admin_cred ORDER BY sr_no DESC";
            $data = @mysqli_query($con, $q);
            
            if ($data->num_rows > 0) {
                // Output data of each row
                while ($row = $data->fetch_assoc()) {
                    $adminEmail = $row["admin_email"];
                    echo '<p>To cancel a booking, please email: <a href="mailto:' . $adminEmail . '">' . $adminEmail . '</a></p>';
                }
            } else {
                echo "Admin email not found in the database";
            }
            ?>
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">

                <!--fetch-->
                <form action="userbookingapprovalFound.php" method="post">
                <h4>Search Booking Record</h4>
                <p><label class="label" for="names">Room Name:</label>
                <input id="room" type="text" style="border-style:solid;" name="room" size="30"
                maxlength="50" value="<?php if (isset($_POST['room'])) echo $_POST['room'];?>"/></p>


                <input class="btn" id="submit" type="submit" name="submit" value="Search"/></p>
                </form>
                <br>

               <!--tablel list-->
               <div class="table-responsive-md" style="height:500px; overflow-y: auto;">
                <table class="table table-hover border">
                        <thead class="sticky-top">
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

                    <?php
                    //fetch data from user_queries
                    	$q = "SELECT * FROM booking ORDER BY sr_no DESC";
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
                </div>
            </div>
        </div>
    </div>
</div>

<!--include scripts file-->
<?php
    require('inc/scripts.php');
?>


</body>
</html>