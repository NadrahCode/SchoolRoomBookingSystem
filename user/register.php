<!--include essential and database file-->
<?php 
	require('inc/essential.php');
	require('inc/db_config.php');
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
   include('css/register.css');
	?>
</style>
</head>
<body class="bg">


<!-- User registration form -->
<div class="login-form text-center rounded bg-white shadow overflow-none">
    <form method="POST">
        <h4 class="bg-dark text-white py-3">USER REGISTER PANEL</h4>
        <div class="p-4">
            <div class="mb-3">
                <label for="user_name" class="nam">User Name:</label>
                <input name="user_name" required type="text" class="form-control shadow-none text-center" placeholder="User Name">
            </div>
            <div class="mb-4">
                <label for="user_pass" class="pass">User Password:</label>
                <input name="user_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required type="password" class="form-control shadow-none text-center" placeholder="User Password">
            </div>
            <div class="mb-3">
                <label for="user_phone" class="no">User Phone No:</label>
                <input name="user_phone" pattern="[0-9]{3}-[0-9]{7}" required type="text" class="form-control shadow-none text-center" placeholder="User Phone.No">
            </div>
            <div class="mb-3">
                <label for="user_email" class="mail">User Email:</label>
                <input name="user_email" pattern="^.+@.+$" required type="text" class="form-control shadow-none text-center" placeholder="User Email">
            </div>
            <button name="submit" type="submit" class="btn text-white bg-dark custom-bg shadow-none">REGISTER</button>
            <button name="reset" type="reset" class="btn text-white bg-dark custom-bg shadow-none">RESET</button>
            <br><br>
            <a href="userindex.php" class="btn text-white bg-dark custom-bg shadow-none">CLICK TO GO BACK</a>
        </div>
    </form>
</div>

<?php require('inc/scripts.php') ?>


<!--fetch data-->
<?php
	//this query inserts a record in the ictbookings table
	//has form been submitted
	if($_SERVER['REQUEST_METHOD']== 'POST')
	{
		$error = array ();//initialize an error array
	
    //check for userName
	if (empty($_POST ['user_name']))
	{
		$error [] = 'You forgot to enter your name.';
	}
	else
	{
		$n = mysqli_real_escape_string($con, trim($_POST ['user_name']));
	}


	//check for a userPassword
	if (empty ($_POST['user_pass']))
	{
		$error [] = 'You forgot to the password.';
	}
	else
	{
		$p = mysqli_real_escape_string ($con, trim($_POST['user_pass']));
	}
	
	
	//check for a userPhoneNo
	if (empty($_POST ['user_phone']))
	{
		$error [] = 'You forgot to enter your phone number.';
	}
	else
	{
		$ph = mysqli_real_escape_string($con, trim($_POST ['user_phone']));
	}
	
	//check for userEmail
	if (empty($_POST ['user_email']))
	{
		$error [] = 'You forgot to enter your email.';
	}
	else
	{
		$e = mysqli_real_escape_string($con, trim($_POST ['user_email']));
	}
	
	if (empty($error)) {
        // Check if the combination of user_name and user_pass already exists in the database
        $check_query = "SELECT sr_no FROM user_cred WHERE user_name = '$n' AND user_pass = '$p'";
        $check_result = mysqli_query($con, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            // A record with the same user_name and user_pass already exists
            alert('error', 'Already registered');
        } else {
            // Insert the new user into the database
            $insert_query = "INSERT INTO user_cred (sr_no, user_name, user_pass, user_phone, user_email) VALUES('', '$n', '$p', '$ph', '$e')";
            $insert_result = mysqli_query($con, $insert_query);

            if ($insert_result) {
                alert2('success', 'Thank You For registering');
                exit();
            } else {
                // If the insert query fails
                echo '<h1>System error<h1>';

                // Debugging message
                echo '<p>' . mysqli_error($con) . '<br><br>Query: ' . $insert_query . '</p>';
            }
        }
    } else {
        // Display the error messages
        echo '<h1>Error:</h1>';
        foreach ($error as $err) {
            echo '<p>' . $err . '</p>';
        }
    }

    // Close the database connection
    mysqli_close($con);
    exit();
}
?>
</body>
</html> 