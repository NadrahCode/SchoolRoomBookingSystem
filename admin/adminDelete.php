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
<?php
require('inc/links.php');
?>

<style>

</style>


</head>
<body class="bg-light">

<?php 
    require('inc/header.php')
?>


<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p4 overflow-hidden">
            <br>
            <h3 class="mb-4">ADMIN DELETE</h3>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
					
	
	<?php
	//look for a valid user id, either throught GET or POST
	if((isset($_GET['id'])) && (is_numeric($_GET['id'])))
	{
		$id = $_GET['id'];
	}
	
	else if ((isset($_POST['id'])) && (is_numeric($_POST['id'])))
	{
		$id = $_POST['id'];
	}
	
	else
	{
		echo '<p class = "error">This page has been accessed in error.</p>';
		exit();
	}

    if ($_SERVER['REQUEST_METHOD']=='POST')
    {
        if($_POST['sure']=='Yes')//delete the record
        {
            //make the query
            $q = "DELETE FROM admin_cred WHERE sr_no = $id LIMIT 1";
            $result = @mysqli_query($con,$q);//run the query

            if (mysqli_affected_rows($con)== 1)//if there was a problem
            //display messege
            {
                echo '<script>alert("THE USER HAS BEEN DELETED");
				window.location.href="adminList.php";</script>';
			}
            else
            {
                //display error messege
                echo '<p class= "THE RECORD COULD NOT BE DELETED.<br>
                PROBABLY BECAUSE IT DOES NOT EXIST OR DUE TO SYSTEM ERROR.</p>';

                echo'<p>'.mysqli_error($con).'<br/> query:'.$q.'</p>';
                //debugging messege
            }
        }

        else
        {
            //display the form
            //retreive the member data
            
            echo '<script>alert("THE USER HAS NOT BEEN DELETED");
				window.location.href="adminList.php";</script>';
        }
        
    }
    else
    {
        //display the form
        //retreive the member data

        $q = "SELECT admin_name FROM admin_cred WHERE sr_no = $id";
        $result = @mysqli_query($con,$q);

        if(mysqli_num_rows($result) == 1)
        {
            //get user information
            $row = mysqli_fetch_array($result,MYSQLI_NUM);
            echo"<h3>ARE YOU SURE WANT TO PERMENENTLY DELETE $row[0]? </h3>";
            echo'<form action="adminDelete.php" method="POST">
            <br>
            <input id="submit-no" type="submit" name="sure" value="Yes">
            <input id="submit-no" type="submit" name="sure" value="No">
            <input type="hidden" name="id" value="'.$id.'">
            </form>';
        }

        else
        {
            //if didnt run
            //messege
            echo '<p class="error"> THIS PAGE HAS BEEN ACCESED IN ERROR</p>';
            echo '<p>&nbsp;</p>';
        }
    }

    mysqli_close($con);
    ?>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>