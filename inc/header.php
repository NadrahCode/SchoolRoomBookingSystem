<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SCHOOL ROOM BOOKING SYSTEM</title>
    

<style>
	<?php
   include('css/common.css');
   include('css/homepage.css');
	?>
</style>

    
    <!-- Include the database and essential PHP files -->
    <?php
    require('admin/inc/db_config.php');
    require('admin/inc/essential.php');
    ?>
</head>
<body>

<!-- Navigation Bar -->
<nav id="nav-bar" class="navbar navbar-expand-lg px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 mb-lg-0 fw-bold fs-2 h-font" href="index.php">SKPTD</a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link me-2" href="rooms.php">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="about.php">About Us</a>
                </li>
            </ul>

            <!-- Add user Login Link -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="user\userindex.php">User Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


</body>
</html>
