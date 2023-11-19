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
            <h1 class="mb-4">USER INQURIES LIST</h1>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                <br>

                <!--table list-->
                <div class="table-responsive-md" style="height:500px; overflow-y: scroll;">
                <table class="table table-hover border">
                        <thead class="sticky-top">
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

                    

                    <?php
                        //fetch data from user_queries
                        $in=$_POST['names'];
                        $in= mysqli_real_escape_string($con,$in);

                        //make the query
                        $q = "SELECT sr_no, names,email,phone,
                        subjects,messege,status
                        FROM user_queries WHERE names = '$in' ORDER BY sr_no";

                        //run the query and assign it to the variable
                        $result = @mysqli_query($con,$q);
                    	while($row=@mysqli_fetch_array($result, MYSQLI_ASSOC))

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

                <a class="btn" href = "userinquriesstatus.php?id='.$row['sr_no'].'">Back</a></td>

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