<!DOCTYPE html>
<html>
<head>
<title>SCHOOL ROOM BOOKING SYSTEM</title>

<!--includes the styles bootstrap-->
<?php require('inc/links.php'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


<!--includes the scpecific css file-->
<style>
	<?php
   include('css/common.css');
   include('css/about.css');
	?>
</style>


</head>
<body>
<!--includes the navigation bar-->
<?php require('inc/header.php'); ?>

<!--title and description-->
<div class="my-5 px-4">
  <h1 class="fw-bold h-font text-center">ABOUT US 📘</h1>
  <div class="h-line bg-dark"></div>
  <p class="text-center mt-3">
    An information bio about website
  </p>
</div>

<!--about us title and description-->
<div class="container">
  <div class="row justify-content-between align-items-center">
    <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
      <h3 class="mb-5">ASSALAMUALAIKUM AND GREETING!👋</h3>
      <p class="text">
      <p class="text">
        This is the personal project for final year project.
      </p>
      <p class="text">
        A website about booking various rooms for either teaching or leisure purpose.
      </p>
      <p class="text">
        Users can view any room available offered.
      </p>
      <p class="text">
        Admin can manage the systems.
      </p>
      <p class="text">
        Provided for teacher and school employees.
      </p>
    </div>
    <div class="col-lg-5 col-md-5 mb-2 order-lg-2 order-md-2 order-1">
      <img src="images/about/school.jpg" width="800px" height="450px" style="border:5px solid black">
    </div>
  </div>
</div>


<!--collum with image and title-->
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
        <img src="images/about/hotel.svg" width="70px">
        <h4 class="mt-3">ROOMS AVAILABLES FOR WORK PURPOSE</h4>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
        <img src="images/about/customers.svg" width="70px">
        <h4 class="mt-3">AMONG TEACHER AND EMPLOYEES</h4>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
        <img src="images/about/rating.svg" width="70px">
        <h4 class="mt-3">VARIETIES EQUIPTMENT OFFERED</h4>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
        <img src="images/about/staff.svg" width="70px">
        <h4 class="mt-3">LIVE ADMINS MANAGEMENT</h4>
      </div>
    </div>
  
  </div>
</div>


<!--include the footer-->
<?php require('inc/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>