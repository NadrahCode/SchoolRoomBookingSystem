
<!--if user trie to run file without login, they will be directed to loginpage-->
<?php
function adminLogin()
{
    session_start();
    if(!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)){
        echo"<script>
        window.location.href='index.php';
        </script>";
    }
    session_regenerate_id(true);
}


//redirect
function redirect($url){
    echo"<script>
    window.location.href='$url';
    </script>";
}


//messege alert
function alert($type,$msg){
    $bs_class = ($type == "alert") ? "alert-success" : "alert-danger";

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