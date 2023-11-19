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
   <link rel="stylesheet" href="css/common.css">
	<title>Admin Panel - Settings</title>

<!--include links file-->
<?php
require('inc/links.php');
?>

<!--include spesific css file-->
<style>
<?php
require('css/common.css');
require('css/room.css');
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
            <h3 class="mb-4">ROOM UPDATE</h3>

            

                <?php
                //update room
                if(isset($_POST['update_product'])){
                    $update_p_id = $_POST['update_p_id'];
                    $update_p_name = $_POST['update_p_name'];
                    $update_p_desc = $_POST['update_p_desc'];
                    $update_p_equipt = $_POST['update_p_equipt'];
                    $update_p_image = $_FILES['update_p_image']['name'];
                    $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
                    $update_p_image_folder = './uploaded_img/'.$update_p_image;

                    $update_query = mysqli_query($con, "UPDATE `room` SET name 
                    = '$update_p_name', description = '$update_p_desc',equiptment = '$update_p_equipt', image = '$update_p_image' WHERE id = '$update_p_id'");

                    if($update_query){
                        move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);

                        echo '<script>alert("THE ROOM HAS BEEN UPDATED");
                        window.location.href="roomList.php";</script>';
                    }else{
                        echo '<script>alert("THE ROOM HAS NOT BEEN UPDATED");
                        window.location.href="roomList.php";</script>';
                    }

                    
                }

                  if(isset($_GET['edit'])){
                  $edit_id = $_GET['edit'];
                  $edit_query = mysqli_query($con, "SELECT * FROM `room` WHERE id = $edit_id");
                  if(mysqli_num_rows($edit_query) > 0){
                     while($fetch_edit = mysqli_fetch_assoc($edit_query)){
                  ?>
                   <!--submisssion form-->
                   <form action="" method="post" enctype="multipart/form-data">
                            <img src="./uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
                            <br><br>
                            <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>" placeholder="Room Name">
                            </div>
                            <br><br>
                            <div class="form-group">
                                <textarea class="form-control" required name="update_p_desc" rows="4" placeholder="Description"><?php echo $fetch_edit['description']; ?></textarea>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <textarea class="form-control" required name="update_p_equipt" rows="4" placeholder="Equipment"><?php echo $fetch_edit['equiptment']; ?></textarea>
                            </div>
                            <br><br>
                                <input type="file"  class="" required name="update_p_image"  accept="image/png, image/jpg, image/jpeg">
                                <br><br>
                            <button type="submit" class="btn btn-primary" name="update_product">Update the room</button>
                            <a href="RoomList.php" class="btn btn-secondary">Back</a>
                            <br><br>
                        </form>


                  <?php
                        };
                     };
                     echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
                  };
               ?>
<!--include scripts file-->
<?php
    require('inc/scripts.php');
?>


</body>
</html>