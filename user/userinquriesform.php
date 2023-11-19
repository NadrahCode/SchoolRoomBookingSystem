<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="with=device-with, initial-scale=1.0">
    <title>User Panel - Inquiry Form</title>

    <!-- Include essential and database file -->
    <?php
    require('inc/essential.php');
    require('inc/db_config.php');
    userLogin();
    ?>

    <!-- Include link file -->
    <?php
    require('inc/links.php');
    ?>

    <!-- Include specific CSS file -->
    <style>
        <?php
        require('css/common.css');
        ?>
    </style>
</head>
<body class="bg-light">

    <!-- Include header file -->
    <?php 
    require('inc/header.php')
    ?>

    <!-- Title -->
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p4 overflow-hidden">
                <br>
                <h1 class="mb-4">USER INQURIES FORM</h1>

                <!-- Submission form -->
                <div class="col-lg-auto col-md-6 mb-5 px-4">
                    <div class="bg-white rounded shadow p-4">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label" style="font-weight: 500;">Name</label>
                                <input type="text" id="names" name="names" class="form-control shadow-none" value="<?php echo $_SESSION['user_name']; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" style="font-weight: 500;">Email</label>
                                <input type="email" id="email" name="email" class="form-control shadow-none" value="<?php echo $_SESSION['user_email']; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" style="font-weight: 500;">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="form-control shadow-none" value="<?php echo $_SESSION['user_phone']; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" style="font-weight: 500;">Subject</label>
                                <input type="text" id="subjects" name="subjects" class="form-control shadow-none" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" style="font-weight: 500;">Message</label>
                                <textarea id="messege" name="messege" class="form-control shadow-none" rows="5" style="resize: none;" required></textarea>
                            </div>
                            <button type="submit" name="send" class="btn text-white custom-bg mt-3">Send Inquiry</button>
                        </form>
                    </div>
                </div>

                <!-- Fetch data from the database -->
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $error = array();

                    if (empty($_POST['names'])) {
                        $error[] = 'You forgot to enter your names.';
                    } else {
                        $name = mysqli_real_escape_string($con, trim($_POST['names']));
                    }

                    if (empty($_POST['email'])) {
                        $error[] = 'You forgot to enter your email.';
                    } else {
                        $email = mysqli_real_escape_string($con, trim($_POST['email']));
                    }

                    if (empty($_POST['phone'])) {
                        $error[] = 'You forgot to enter your phone number.';
                    } else {
                        $phone = mysqli_real_escape_string($con, trim($_POST['phone']));
                    }

                    if (empty($_POST['subjects'])) {
                        $error[] = 'You forgot to enter the subjects.';
                    } else {
                        $subject = mysqli_real_escape_string($con, trim($_POST['subjects']));
                    }

                    if (empty($_POST['messege'])) {
                        $error[] = 'You forgot to enter your messege.';
                    } else {
                        $message = mysqli_real_escape_string($con, trim($_POST['messege']));
                    }

                    if (empty($error)) {
                        $query = "INSERT INTO user_queries (names, email, phone, subjects, messege) VALUES('$name', '$email', '$phone', '$subject', '$message')";
                        $result = mysqli_query($con, $query);

                        if ($result) {
                            echo '<script>alert("Thank you for your inquiry. Please check the status in 1 - 2 days."); window.location.href="inquiriesreceipt.php";</script>';
                        } else {
                            echo '<script>alert("System Error. Please try again.");</script>';
                        }
                    } else {
                        // Display the error messages
                        echo '<script>alert("' . implode('\n', $error) . '");</script>';
                    }
                }
                ?>
            </div>
            
</body>
</html>

<!--include scripts file-->
<?php
    require('inc/scripts.php');
?>


</body>
</html>
       
