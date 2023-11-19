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
	<meta name="viewport" content="with=device-with, initial-scale=1.0">
	<title>User Panel - Settings</title>

<!--includes the links file-->
<?php
require('inc/links.php');
?>

<!--includes the scpecific css file-->
<style>
    <?php
require('css/common.css');
    ?>
</style>



</head>
<body class="bg-light">


<!--includes the header file-->
<?php 
    require('inc/header.php')
?>

<!--includes title-->
<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p4 overflow-hidden">
            <br>
            <?php
                if (isset($_SESSION['userLogin']) && $_SESSION['userLogin']) {
                    echo '<h1 class="mb-4"><p>' . $_SESSION['user_name'] . '  DETAILS</p></h1>';
                    
                }
               
            ?>

                <!--table list-->
                <div class="table-responsive-md" style="height:500px; overflow-y: auto;">
                <table class="table table-hover border">
                        <thead class="sticky-top">
                        <tr class="bg-dark text-light">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Password</th>
                        <th scope="col">Phone No</th>
                        <th scope="col" >Email</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                            $logged_in_userid = $_SESSION['sr_no']; // Get the logged-in username from the session

                            $q = "SELECT * FROM user_cred WHERE sr_no = ? ORDER BY sr_no DESC";
                            $values = [$logged_in_userid];
                            $data = select($q, $values, "s");

                            $row_num = 1; // Initialize a row number counter

                            while ($row = mysqli_fetch_assoc($data)) {
                                echo '<tr>
                                <th scope="row">' . $row_num . '</th>
                                <td>' . $row['user_name'] . '</td>
                                <td>' . $row['user_pass'] . '</td>
                                <td>' . $row['user_phone'] . '</td>
                                <td>' . $row['user_email'] . '</td>
                                </tr>';

                                $row_num++; // Increment the row number
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




<!--includes scripts file-->
<?php
    require('inc/scripts.php');
?>


</body>
</html>