<!DOCTYPE html>
<html>
<head>
    <title>SCHOOL ROOM BOOKING SYSTEM</title>

    <!-- Include the styles, Bootstrap, and navigation bar -->
    <?php require('inc/links.php'); ?>
    <?php require('inc/header.php'); ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<!-- Include the specific CSS files -->
<style>
    <?php
    include('css/room.css');
    include('css/common.css');
    ?>
</style>

<div class="my-5 px-4">
    <h1 class="fw-bold h-font text-center">ROOMS AVAILABLE 🧑‍🏫</h1>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
        These are the list of rooms available for users to use
    </p>
    <br><br>

    
    <div class="room-container">
        <?php
        $select_products = mysqli_query($con, "SELECT * FROM `room`");
        if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_product = mysqli_fetch_assoc($select_products)) {
        ?>
        <div class="room-item">
            <img src="admin/uploaded_img/<?php echo $fetch_product['image']; ?>" class="room-image">
            <h2 class="room-title"><?php echo $fetch_product['name']; ?></h2>
            <div class="room-details">
                <h4 class="room-description-title">Description</h4>
                <p class="room-description"><?php echo $fetch_product['description']; ?></p>
                <h4 class="room-equipment-title">Equipment</h4>
                <p class="room-equipment"><?php echo $fetch_product['equiptment']; ?></p>
            </div>
            <!-- Add JavaScript to handle button click -->
            <button class="room-button" onclick="bookRoom()">Book Now</button>
        </div>
        <?php
            };
        };
        ?>
    </div>
</div>

<!-- Include the footer -->
<?php require('inc/footer.php'); ?>

<!-- Include Bootstrap and your custom JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // JavaScript function to handle button click
    function bookRoom() {
        // Check if the user is logged in (you can use your own logic here)
        var isLoggedIn = false; // Replace with your login check logic

        if (!isLoggedIn) {
            // If not logged in, show an alert
            alert("Please login first to book a room.");
            // Redirect the user to the login page
            window.location.href = "user/userindex.php"; // Replace with your login page URL
        } else {
            // If logged in, proceed with booking logic (if any)
            // You can add booking functionality here
        }
    }
</script>
</body>
</html>
