
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


<!--include links file-->
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
            <h1 class="mb-4">REPORT</h1>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">

                <!--fetch-->
                <form action="ReportFound.php" method="post">
                <h4>Search Booking Record</h4>
                <p><label class="label" for="names">Room Name:</label>
                <input id="room" type="text" style="border-style:solid;" name="room" size="30"
                maxlength="50" value="<?php if (isset($_POST['room'])) echo $_POST['room'];?>"/></p>


                <input class="btn" id="submit" type="submit" name="submit" value="Search"/></p>
                </form>
                <br>

              

<!--include scripts file-->
<?php
    require('inc/scripts.php');
?>


</body>
</html>