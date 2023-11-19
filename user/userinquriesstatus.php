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

<!--include link file-->
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
                <!--fetch data-->
                <form action="userinquriesstatusFound.php" method="post">
                <h4>Search Inquries Record</h4>
                <p><label class="label" for="names">User Name:</label>
                <input id="names" type="text"style="border-style:solid;" name="names" size="30"
                maxlength="50" value="<?php if (isset($_POST['names']))
                echo $_POST['names'];?>"/></p>

                <input class="btn" id="submit" type="submit" name="submit" value="Search"/></p>
                </form>
                <br>
                <!--tablel list-->
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
                    	$q = "SELECT * FROM user_queries ORDER BY sr_no DESC";
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