<!--include essential and database file-->
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
	<title>Admin Panel - Settings</title>

<!--include link file-->
<?php
require('inc/links.php');
?>

<!--spasific css file-->
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
            <h1 class="mb-4">ADMIN LIST</h1>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                <br>

                <!--table list-->
                <div class="table-responsive-md" style="height:200px; overflow-y: scroll;">
                <table class="table table-hover border">
                        <thead class="sticky-top">
                        <tr class="bg-dark text-light">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Password</th>
                        <th scope="col">Phone No</th>
                        <th scope="col" >Email</th>
                        <th scope="col" width="5%" >Update</th>
                        <th scope="col" width="5%">Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                    

                    <?php
                        //fecth
                        $in=$_POST['admin_name'];
                        $in= mysqli_real_escape_string($con,$in);

                        //make the query
                        $q = "SELECT sr_no, admin_name,admin_pass,admin_phone,
                        admin_email
                        FROM admin_cred WHERE admin_name = '$in' ORDER BY sr_no";

                        //run the query and assign it to the variable
                        $result = @mysqli_query($con,$q);
                    	while($row=@mysqli_fetch_array($result, MYSQLI_ASSOC))

                                {
                                    echo '<tr>
                                    <td>'.$row['sr_no'].'</td>
                                    <td>'.$row['admin_name'].'</td>
                                    <td>'.$row['admin_pass'].'</td>
                                    <td>'.$row['admin_phone'].'</td>
                                    <td>'.$row['admin_email'].'</td>
                                    <td align = "center"><a class="btn" href = "adminUpdate.php?id='.$row['sr_no'].'">Update✍🏻</a></td>
                                    <td align = "center"><a class="btn" href = "adminDelete.php?id='.$row['sr_no'].'">Delete🗑️</a></td>
                                    </tr>';
                                }
                            
                    
                    ?>
                        
                    </tbody>
                    </table>
                </div>

                <a class="btn" href = "adminList.php?id='.$row['sr_no'].'">Back</a></td>

                </div>
            </div>
        </div>
    </div>
</div>

<!--include script file-->
<?php
    require('inc/scripts.php');
?>


</body>
</html>