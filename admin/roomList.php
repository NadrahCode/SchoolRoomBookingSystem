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
require('css/room.css');
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
            <h1 class="mb-4 ">ROOM LIST</h1>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                  <!--fetch data-->
                <form action="roomFound.php" method="post">
                <h4>Search Room Record</h4>
                <p><label class="label" for="name">Room Name:</label>
                <input id="name" type="text"style="border-style:solid;" name="name" size="30"
                maxlength="50" value="<?php if (isset($_POST['name']))
                echo $_POST['name'];?>"/></p>

                <input class="btn" id="submit" type="submit" name="submit" value="Search"/></p>
                </form>
                <br>

                <div class="container">

                <section>
                  <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
                     <h3>Add new room</h3>
                     <div class="form-group">
                           <input type="text" name="p_name" class="form-control" placeholder="Enter the room name" required>
                     </div>
                     <br>
                     <div class="form-group">
                           <textarea name="p_desc" class="form-control" rows="4" placeholder="Enter the room description" 
                           style="resize: none;" required></textarea>
                     </div>
                     <br>
                     <div class="form-group">
                           <textarea name="p_equipt" class="form-control" rows="4" placeholder="Enter the room equipment"
                           style="resize: none;" required></textarea>
                     </div>
                     <br>
                     <div class="form-group">
                           <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="form-control-file" required>
                     </div>
                     <br>
                     <button type="submit" class="btn btn-primary" name="add_product">ADD ROOM</button>
                  </form>
               </section>
                  <br>


                  <section class="display-product-table">

                  <!--table list-->
                  <div class="table-responsive-md" style="height:500px; overflow-y: scroll;">
                  <table class="table table-hover border">
                        <thead class="sticky-top">
                        <tr class="bg-dark text-light">
                        <th scope="col">Room Image</th>
                        <th scope="col">Room Name</th>
                        <th scope="col">Room Desc</th>
                        <th scope="col">Room Equipt</th>
                        <th scope="col" >Update</th>
                        <th scope="col" >Delete</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                     <br>

                           <?php
                           //fetch data from room
                              $select_products = mysqli_query($con, "SELECT * FROM `room`");
                              if(mysqli_num_rows($select_products) > 0){
                                 while($row = mysqli_fetch_assoc($select_products)){
                           ?>

                           <tr>
                              <td><img src="./uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['description']; ?></td>
                              <td><?php echo $row['equiptment']; ?></td>
                              <td><a class="btn" href="roomUpdate.php?edit=<?php echo $row['id']; ?>"></i>update ✍🏻</a></td>
                              <td><a class="btn" href="roomList.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('are your sure you want to delete this?');"></i>delete 🗑️</a></td>
                           </td>
                           </tr>

                           <?php
                              };    
                              }else{
                                 echo "<div class='empty'>no room added</div>";
                              };
                           ?>
                        </tbody>
                     </table>
                           
                     <?php
                  //add room
                     if(isset($_POST['add_product'])){
                  $p_name = $_POST['p_name'];
                  $p_desc = $_POST['p_desc'];
                  $p_equipt = $_POST['p_equipt'];
                  $p_image = $_FILES['p_image']['name'];
                  $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
                  $p_image_folder = './uploaded_img/'.$p_image;

                  $insert_query = mysqli_query($con, "INSERT INTO `room`(name, description,equiptment, image) VALUES('$p_name', '$p_desc','$p_equipt', '$p_image')") or die('query failed');

                  if($insert_query){
                     move_uploaded_file($p_image_tmp_name, $p_image_folder);
                     $message[] = 'product add succesfully';
                     echo '<script>alert("THE ROOM HAS BEEN ADDED");
				         window.location.href="roomList.php";</script>';
                  }else{
                     $message[] = 'could not add the product';
                     echo '<script>alert("THE ROOM HAS NOT BEEN ADDED");
				         window.location.href="roomList.php";</script>';
                  }
               };

               
               //delete room
               if(isset($_GET['delete'])){
                  $delete_id = $_GET['delete'];
                  $delete_query = mysqli_query($con, "DELETE FROM `room` WHERE id = $delete_id ") or die('query failed');
                  if($delete_query){
                     echo '<script>alert("THE ROOM HAS BEEN DELETED");
				         window.location.href="roomList.php";</script>';
                  }else{
                     echo '<script>alert("THE ROOM HAS NOT BEEN DELETED");
				         window.location.href="roomList.php";</script>';
                  };
               };

            
               ?>   
               </section>
            </section>

                </div>
            </div>
        </div>
    </div>
</div>
<!--include scripsts file-->
<?php
    require('inc/scripts.php');
?>


</body>
</html>