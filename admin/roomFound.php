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
    <?php require('inc/links.php'); ?>

    <!--include specific CSS file-->
    <style>
        <?php require('css/common.css'); ?>
    </style>
</head>
<body class="bg-light">

<!--include header file-->
<?php require('inc/header.php') ?>

<!--title-->
<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <br>
            <h1 class="mb-4">ROOM LIST</h1>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <br>

                    <!--table list-->
                    <div class="table-responsive-md" style="height: 500px; overflow-y: scroll;">
                        <table class="table table-hover border">
                            <thead class="sticky-top">
                            <tr class="bg-dark text-light">
                                <th scope="col">Room Image</th>
                                <th scope="col">Room Name</th>
                                <th scope="col">Room Desc</th>
                                <th scope="col">Room Equipment</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            // Fetch data from room


                            $in = mysqli_real_escape_string($con, $_POST['name']);
                            $q = "SELECT id, name, description, equiptment, image
                            FROM room 
                            WHERE name = '$in'";

                            $result = @mysqli_query($con, $q);
                            while ($row = @mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                echo '<tr>
                                <td><img src="./uploaded_img/' . $row['image'] . '" height="100" alt=""></td>
                                <td>' . $row['name'] . '</td>
                                <td>' . $row['description'] . '</td>
                                <td>' . $row['equiptment'] . '</td>
                                <td><a class="btn" href="roomUpdate.php?edit=' . $row['id'] . '">update ✍🏻</a></td>
                                <td><a class="btn" href="roomList.php?delete=' . $row['id'] . '" onclick="return confirm(\'Are you sure you want to delete this?\')">delete 🗑️</a></td>
                                </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <a class="btn" href="roomList.php">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!--include scripts file-->
<?php require('inc/scripts.php'); ?>

</body>
</html>
