<!--include essential and database file-->
<?php 
	require('inc/essential.php');
	require('inc/db_config.php');
	session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="with=device-with, initial-scale=1.0">
	<title>User Login Panel</title>
	<?php require('inc/links.php') ?>


<!--includes the scpecific css file-->
<style>
<?php
   include('css/login.css');
?>
</style>
</head>
<body class="bg">

	<div class="login-form text-center rounded bg-white shadow overflow-none">
		<!--login form-->
		<form method="POST">
		<h4 class="bg-dark text-white py-3">USER LOGIN PANEL</h4>	
		<div class="p-4">
		<i class="bi bi-person-circle"></i>
			<div class="mb-3">
			<label for ="user_name" class="nam">User Name:</label>
    			<input name="user_name" required type="text" class="form-control shadow-none text-center" placeholder="User Name">
  			  </div>
  			<div class="mb-4">
			<label for ="user_pass" class="pass">User Password:</label>
    			<input name="user_pass" required type="password" class="form-control shadow-none text-center" placeholder="User Password">
  			</div>
  			<button name="login" type="submit" class="btn text-white bg-dark custom-bg shadow-none">LOGIN</button>
			  <button name="reset" type = "reset" class="btn text-white bg-dark custom-bg shadow-none">RESET</button>
			<br><br>Don't Have An Account?
			<br><a href="register.php" class="btn text-white bg-dark custom-bg shadow-none">SIGN UP</a>
		</div>
	</form>
</div>

<!--activate dashboard-->
<?php
	if (isset($_POST['login'])) 
	{
	 $frm_data = filteration($_POST);
	 
	 $query = "SELECT * FROM `user_cred` WHERE `user_name`=? AND `user_pass` = ?";
	 $values = [$frm_data['user_name'],$frm_data['user_pass']];


	 $res = select($query,$values,"ss");
	 if($res->num_rows==1){
		$row = mysqli_fetch_assoc($res);
		$_SESSION['userLogin'] = true;
		$_SESSION['sr_no'] = $row['sr_no'];
        $_SESSION['user_name'] = $row['user_name'];
		$_SESSION['user_email'] = $row['user_email']; 
		$_SESSION['user_phone'] = $row['user_phone'];
        
		
		
            echo '<script>alert("ENTERING");</script>';
            redirect('dashboard.php');
                
            }
             else{
                alert('error','Login failed - Maybe Your Should Try Again Or Register?');
             }
            }
         ?>
        
        
        <!--include scripts file-->
        <?php require('inc/scripts.php') ?>
        </body>
        </html> 