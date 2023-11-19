
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

<style>

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
            <h3 class="mb-4">USER UPDATE</h3>

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
	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$error = array(); //initialize an error array
		
		//look for adminName
		if(empty($_POST['user_name']))
		{
			$error[]= 'You forgot to enter your name.';
		}
		else
		{
			$n = mysqli_real_escape_string ($con,trim ($_POST['user_name']));
		}

		if(empty($_POST['user_pass']))
		{
			$error[]= 'You forgot to enter your pass.';
		}
		else
		{
			$p = mysqli_real_escape_string ($con,trim ($_POST['user_pass']));
		}
		
		//look for a adminPhoneNo
		if(empty($_POST['user_phone']))
		{
			$error[]= 'You forgot to enter your phone.';
		}
		else
		{
			$ph = mysqli_real_escape_string ($con,trim ($_POST['user_phone']));
		}
		
		//look for adminEmail
		if(empty($_POST['user_email']))
		{
			$error[]= 'You forgot to enter your email.';
		}
		else
		{
			$e = mysqli_real_escape_string ($con,trim ($_POST['user_email']));
		}
		

		
		//if no problem occoured
		if(empty($error))
		{
				$q = "SELECT sr_no FROM user_cred WHERE user_name = '$n' AND sr_no!= $id";
			
				$result= @mysqli_query($con,$q);//run the querry
			
		if (mysqli_num_rows($result)==0)
		{	
				$q = "UPDATE user_cred SET user_name = '$n', user_pass = '$p',user_phone='$ph',
				user_email='$e' WHERE sr_no='$id' LIMIT 1";
			
				$result= @mysqli_query ($con,$q);//run the querry
			
		if(mysqli_affected_rows($con)==1)
			{
				echo '<script>alert("THE USER HAS BEEN EDITED SUCESSFULLY");
				window.location.href="userList.php";</script>';
			}
		else
			{
				echo '<script>alert("NO UPDATE BEEN MADE. PLEASE TRY AGAIN.");
				window.location.href="userList.php";</script>';
			}
		
		}
		
		else
		{
			echo '<p class="error">THE ID HAS BEEN REGISTERED <p/>';
		}
			}
			else
			{
				echo '<p class="error"THE FOLLOWING ERROR (S) OCCOURED : <br/>';
				foreach ($error as $msg)
				{
					echo "-msg<br>\n";
				}
				echo '<p><p> Please Try Again. <p>';
			}
		}
		
		$q = "SELECT user_name,user_pass,user_phone,user_email 
		FROM user_cred WHERE sr_no = $id";
		
		$result= @mysqli_query ($con,$q);//run the querry
		
		if(mysqli_num_rows ($result)==1)
		{
			//get admin information
			$row = mysqli_fetch_array ($result,MYSQLI_NUM);
			
			//create the form
			echo '<form action="userUpdate.php" method="post">
			<p><label class="label" for="user_name">user Name* : </label>
			<input type="text" id="user_name" name="user_name" size="30" maxlength="50" value="'.$row[0].'"></p>

			<p><br><label class="label" for="user_pass">User Password* : </label>
			<input type="text" id="user_pass" name="user_pass" size="20" maxlength="50" value="'.$row[1].'"></p>

			<p><br><label class="label" for="user_phone">Phone No.* : </label>
			<input type="tel" pattern="[0-9]{3}-[0-9]{7}" id="user_phone" name="user_phone" size="15" maxlength="20" value="'.$row[2].'"></p>

			<p><br><label class="label" for="user_email">User Email* : </label>
			<input type="text" pattern="[a-z0-9._%+-]+@[a-z-9.-]+\.[a-z]{2,}$" id="user_email" name="user_email" size="30" maxlength="50" required value="'.$row[3].'"></p>

			<br>
			<input id="submit" type="submit" name="submit" value="Update">
			<br><input type="hidden" name="id" value="'.$id.'"/>
			</form>';

		}
		else
		{
			//if it didnt run
			//messege
			echo '<p class="error">THIS PAGE HAS BEEM ACCESS IN ERROR<p>;
			window.location.href="adminList.php";</script>';
		}
		//end if it (result)
		mysqli_close($con);//close the database connection aborted
	?>
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