<!DOCTYPE html>
<html>
<head>
    <title>SCHOOL ROOM BOOKING SYSTEM</title>
    
    <!-- Include external CSS and JavaScript -->
    <?php require('inc/links.php'); ?>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    
    <!-- Include your custom CSS files -->
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/common.css">
</head>
<body>

<!-- Include specific CSS files using PHP -->
<style>
    <?php
    include('css/homepage.css');
    include('css/common.css');
    ?>
</style>

<!-- Include the navigation bar -->
<?php 
require('inc/header.php'); 
?>

<!-- Main page title and short description -->
<br><br>
<div class="main-title">
    <h1 class="text-center fw-bold h-font">SCHOOL ROOM BOOKING SYSTEM</h1>
    <p class="text-center ">Your trusted platform for booking school rooms anytime and anywhere.</p>
</div>
<br><br>

<!-- Swiper Slider -->
<div class="swiper-container">
    <div class="swiper-wrapper">
        <!-- Slide 1 -->
        <div class="swiper-slide">
            <img src="images\rooms\slider1.jpg" alt="Slide 1">
            <div class="slide-content">
                <h2 class="slide-title">COMPUTER ROOM</h2>
                <p class="slide-description">A computer room in a school is where students use computers for tech learning</p>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="swiper-slide">
            <img src="images\rooms\HALL3.jpg" alt="Slide 2">
            <div class="slide-content">
                <h2 class="slide-title">SCHOOL HALL</h2>
                <p class="slide-description">A school's gathering space where events and meetings take place</p>
            </div>
        </div>
        <!-- Slide 1 -->
        <div class="swiper-slide">
            <img src="images\rooms\LIBRARY2.jpg" alt="Slide 3">
            <div class="slide-content">
                <h2 class="slide-title">LIBRARY</h2>
                <p class="slide-description">A place in a school filled with books to read like a collection for students.</p>
            </div>
        </div>
        <!-- Slide 1 -->
        <div class="swiper-slide">
            <img src="images\rooms\slider3.jpeg" alt="Slide 4">
            <div class="slide-content">
                <h2 class="slide-title">SMART ROOM</h2>
                <p class="slide-description">A high-tech classroom with cool gadgets for learning..</p>
            </div>
        </div>
    </div>
</div>


<script>
    var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1, // Display one slide at a time
    spaceBetween: 0, // No space between slides
    loop: true, // Enable looping (if needed)
    autoplay: {
        delay: 8000, // Autoplay delay in milliseconds
    },
    pagination: {
        el: '.swiper-pagination',
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
</script>



<!-- Quick information -->
<br><br><br>
<div class="main-title">
    <h1 class="text-center fw-bold h-font mt-2">QUICK INSIGHT</h1>
</div>
<div class="homepageContainer">
    <div class="homepageFeatures">
        <div class="homepageFeature">
            <span class="featureIcons"><i class="bi bi-exclamation-circle-fill"></i></span>
            <h3 class="featureTitle">PERKS</h3>
            <p class="featuretext">Varieties of assets provided in different rooms</p>
        </div>
        <div class="homepageFeature">
            <span class="featureIcons"><i class="bi bi-question-circle-fill"></i></span>
            <h3 class="featureTitle">PURPOSE</h3>
            <p class="featuretext">Provide all types of rooms for learning purposes</p>
        </div>
        <div class="homepageFeature">
            <span class="featureIcons"><i class="bi bi-info-circle-fill"></i></span>
            <h3 class="featureTitle">STOCKS</h3>
            <p class="featuretext">Always stays updated and available</p>
        </div>
    </div>
</div>
<br><br><br>



<!-- Contact Section -->
<section id="contact" class="py-5">
    <!-- Main page title and short description -->
<div class="main-title">
    <h1 class="text-center fw-bold h-font mt-2">INFORMATION</h1>
</div>
    <div class="container">
        <div class="row">
            <!-- Map Section -->
            <div class="col-lg-8 mb-4">
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="mb-4">Location</h2>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.1246505026993!2d101.71546721454187!3d3.06132099777067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc356548f44ecd%3A0x7fbfb3e0a9bd26ac!2sSekolah%20Kebangsaan%20Pengkalan%20Tentera%20Darat!5e0!3m2!1sen!2smy!4v1679695280749!5m2!1sen!2smy" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <!-- Contact Information -->
            <div class="col-lg-4">
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="mb-4">Contact Information</h2>
                    <div class="mb-3">
                        <h5 class="fw-bold">Phone</h5>
                        <a href="tel: +0178700689" class="text-decoration-none text-dark"><i class="bi bi-telephone-fill me-2"></i> +0178700689</a>
                    </div>
                    <div class="mb-3">
                        <h5 class="fw-bold">Email</h5>
                        <a href="mailto:sekolah-108-cm1@moe-dl.edu.my" class="text-decoration-none text-dark"><i class="bi bi-envelope-fill me-2"></i> sekolah-108-cm1@moe-dl.edu.my</a>
                    </div>
                    <div class="mb-3">
                        <h5 class="fw-bold">Follow Us</h5>
                        <a href="https://www.facebook.com/people/Sek-Keb-Pengkalan-Tentera-Darat/100066372350466/" class="text-decoration-none text-dark"><i class="bi bi-facebook me-1"></i>
                        <a href="https://www.instagram.com/skptdrasmi/" class="text-decoration-none text-dark"><i class="bi bi-instagram me-1"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold">Help Instruction</h5>
                        <a href="pdf/HELP FOR USERS.pdf" target="_blank" class="text-decoration-none text-dark"><i class="bi bi-file-pdf-fill me-2"></i>User Manual</a>
                        <br>
                        <a href="pdf/HELP FOR ADMIN.pdf" target="_blank" class="text-decoration-none text-dark"><i class="bi bi-file-pdf-fill me-2"></i>Admin Manual</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Include the footer -->
<?php require('inc/footer.php') ?>
</body>
</html>
