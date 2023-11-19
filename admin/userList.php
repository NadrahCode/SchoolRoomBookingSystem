
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
            <h1 class="mb-4">USER LIST</h1>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                <form action="userFound.php" method="post">


                <!--fetch to usersearch file-->
                <h4>Search User Record</h4>
                <p><label class="label" for="user_name">User Name:</label>
                <input id="user_name" type="text"style="border-style:solid;" name="user_name" size="30"
                maxlength="50" value="<?php if (isset($_POST['user_name']))
                echo $_POST['user_name'];?>"/></p>

                <input class="btn" id="submit" type="submit" name="submit" value="Search"/></p>
                </form>
                <br>

                <!--table list-->
                <div class="table-responsive-md" style="height:500px; overflow-y: scroll;">
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


                    <!--fecth from database-->
                    <?php
                    	$q = "SELECT * FROM user_cred ORDER BY sr_no DESC";
                        $data = @mysqli_query ($con, $q);

                        while($row=mysqli_fetch_assoc($data))

                                {
                                    echo '<tr>
                                    <td>'.$row['sr_no'].'</td>
                                    <td>'.$row['user_name'].'</td>
                                    <td>'.$row['user_pass'].'</td>
                                    <td>'.$row['user_phone'].'</td>
                                    <td>'.$row['user_email'].'</td>
                                    <td align = "center"><a class="btn" href = "userUpdate.php?id='.$row['sr_no'].'">Update✍🏻</a></td>
                                    <td align = "center"><a class="btn" href = "userDelete.php?id='.$row['sr_no'].'">Delete🗑️</a></td>
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




<!--includes scripts file-->
<?php
    require('inc/scripts.php');
?>


</body>
</html>