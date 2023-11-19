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
	<title>Admin Login Panel</title>
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
		<h4 class="bg-dark text-white py-3">ADMIN LOGIN PANEL</h4>	
		<div class="p-4">
		<i class="bi bi-person-circle"></i>
			<div class="mb-3">
			<label for ="admin_name" class="nam">Admin Name:</label>
    			<input name="admin_name" required type="text" class="form-control shadow-none text-center" placeholder="Admin Name">
  			  </div>
  			<div class="mb-4">
			<label for ="admin_pass" class="pass">Admin Password:</label>
    			<input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder="Admin Password">
  			</div>
  			<button name="login" type="submit" class="btn text-white bg-dark custom-bg shadow-none">LOGIN</button>
			  <button name="reset" type = "reset" class="btn text-white bg-dark custom-bg shadow-none">RESET</button>
			</div>
	</form>
</div>

<!--activate dashboard-->
<?php
	if (isset($_POST['login'])) 
	{
	 $frm_data = filteration($_POST);
	 
	 $query = "SELECT * FROM `admin_cred` WHERE `admin_name`=? AND `admin_pass` = ?";
	 $values = [$frm_data['admin_name'],$frm_data['admin_pass']];


	 $res = select($query,$values,"ss");
	 if($res->num_rows==1){
		$row = mysqli_fetch_assoc($res);
		$_SESSION['adminLogin'] = true;
		$_SESSION['adminId'] = $row['sr_no'];
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