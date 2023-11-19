<!--if a user tries to run a file without login, they will be directed to the login page-->
<?php
function userLogin()
{
    session_start();
    if (!(isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true)) {
        echo "<script>
        window.location.href='login.php'; // Change 'index.php' to the user login page
        </script>";
    }
    session_regenerate_id(true);
}

// Redirect to a different URL
function redirect($url)
{
    echo "<script>
    window.location.href='$url';
    </script>";
}

// Message alert function
function alert($type, $msg)
{
    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";

    echo <<<alert
		<div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
			<strong>$msg</strong>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		alert;
}

//messege alert
function alert2($type,$msg){
    $bs_class = ($type == "success") ? "alert-success" : "alert-success";

    echo <<<alert
		<div class="alert $bs_class alert-dismissible fade show custom-alert" role="success">
			<strong>$msg</strong>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		alert;
}
?>
