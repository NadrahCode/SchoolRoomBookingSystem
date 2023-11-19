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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Settings</title>

    <!--include link file-->
    <?php
    require('inc/links.php');
    ?>
</head>
<body class="bg-light">

<!--include header file-->
<?php
require('inc/header.php');
?>

<!--title-->
<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden"> <!-- Fixed the class name here -->
            <br>
            <h3 class="mb-4">INQUIRIES UPDATE</h3> <!-- Corrected spelling "INQURIES" to "INQUIRIES" -->

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">

                    <?php
                    // Look for a valid user id, either through GET or POST
                    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                        $id = $_GET['id'];
                    } else if (isset($_POST['id']) && is_numeric($_POST['id'])) {
                        $id = $_POST['id'];
                    } else {
                        echo '<p class="error">This page has been accessed in error.</p>';
                        exit();
                    }

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $error = array(); // Initialize an error array

                        // Check for names
                        if (empty($_POST['names'])) {
                            $error[] = 'You forgot to enter your names.';
                        } else {
                            $n = mysqli_real_escape_string($con, trim($_POST['names']));
                        }

                        // Check for email
                        if (empty($_POST['email'])) {
                            $error[] = 'You forgot to enter your email.';
                        } else {
                            $e = mysqli_real_escape_string($con, trim($_POST['email']));
                        }

                        // Check for phone
                        if (empty($_POST['phone'])) {
                            $error[] = 'You forgot to enter your phone.';
                        } else {
                            $p = mysqli_real_escape_string($con, trim($_POST['phone']));
                        }

                        // Check for subjects
                        if (empty($_POST['subjects'])) {
                            $error[] = 'You forgot to enter your subjects.';
                        } else {
                            $sb = mysqli_real_escape_string($con, trim($_POST['subjects']));
                        }

                        // Check for messege
                        if (empty($_POST['messege'])) {
                            $error[] = 'You forgot to enter your messege.';
                        } else {
                            $m = mysqli_real_escape_string($con, trim($_POST['messege']));
                        }

                        // Check for status
                        if (empty($_POST['status'])) {
                            $error[] = 'You forgot to enter your status.';
                        } else {
                            $s = mysqli_real_escape_string($con, trim($_POST['status']));
                        }

                        // If no problem occurred
                        if (empty($error)) {
                            $q = "SELECT sr_no FROM user_queries WHERE names = '$p' AND sr_no != $id";
                            $result = @mysqli_query($con, $q); // Run the query

                            if (mysqli_num_rows($result) == 0) {
                                $q = "UPDATE user_queries SET names = '$n', email = '$e', phone = '$p', subjects = '$sb', messege = '$m', status = '$s' WHERE sr_no = '$id' LIMIT 1";
                                $result = @mysqli_query($con, $q); // Run the query

                                if (mysqli_affected_rows($con) == 1) {
                                    echo '<script>alert("THE INQURIES HAS BEEN EDITED SUCCESSFULLY");
                                    window.location.href="inquriesList.php";</script>';
                                } else {
                                    echo '<script>alert("NO UPDATE HAS BEEN MADE. PLEASE TRY AGAIN.");
                                    window.location.href="inquriesList.php";</script>';
                                }
                            } else {
                                echo '<p class="error">THE ID HAS BEEN REGISTERED</p>';
                            }
                        } else {
                            echo '<p class="error">THE FOLLOWING ERROR(S) OCCURRED : <br/>';
                            foreach ($error as $msg) {
                                echo "- $msg<br>\n";
                            }
                            echo '</p><p>Please Try Again.</p>';
                        }
                    }

                    $q = "SELECT names, email, phone, subjects, messege, status FROM user_queries WHERE sr_no = $id";
                    $result = @mysqli_query($con, $q); // Run the query

                    if (mysqli_num_rows($result) == 1) {
                        // Get booking information
                        $row = mysqli_fetch_array($result, MYSQLI_NUM);

                        // Create the form
                        echo '<form method="POST">

                        <p><label class="label" for="names">Name* : </label>
                        <input type="text" id="names" name="names" size="30" maxlength="50" value="'.$row[0].'"></p>
                        
                        <p><label class="label" for="email">Email* : </label>
                        <input type="text" id="email" name="email" size="30" maxlength="50" value="'.$row[1].'"></p> <!-- Changed input type to "text" -->
                        
                        <p><label class="label" for="phone">Phone No* : </label>
                        <input type="text" id="phone" name="phone" size="30" maxlength="50" value="'.$row[2].'"></p> <!-- Changed input type to "text" -->
                        
                        <p><label class="label" for="subjects">Subjects* : </label>
                        <input type="text" id="subjects" name="subjects" size="30" maxlength="50" value="'.$row[3].'"></p> <!-- Changed input type to "text" -->
                        
                        <p><label class="label" for="messege">Messege* : </label>
                        <input type="text" id="messege" name="messege" size="30" maxlength="50" value="'.$row[4].'"></p> <!-- Corrected input name to "message" -->
                        
                            <label for="status">Status*:</label>
                            <select name="status" id="status">
                                <option value="Read" ' . ($row[5] === 'Read' ? 'selected' : '') . '>Read</option>
                                <option value="Not Read" ' . ($row[5] === 'Not Read' ? 'selected' : '') . '>Not Read</option>
                            </select>

                            <br>
                            <br><p><input id="submit" type="submit" name="submit" value="Update"></p>
                            <input type="hidden" name="id" value="'.$id.'"/>
                        </form>';
                    } else {
                        // If it didn't run
                        // Message
                        echo '<p class="error">THIS PAGE HAS BEEN ACCESSED IN ERROR</p>';
                    }

                    // End if it (result)
                    mysqli_close($con); // Close the database connection aborted
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--include scripts file-->
<?php
require('inc/scripts.php');
?>
</body>
</html>
