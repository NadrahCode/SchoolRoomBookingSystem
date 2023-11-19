<!--include essential and database file-->
<?php
require('inc/essential.php');
require('inc/db_config.php');
userLogin();
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="with=device-with, initial-scale=1.0">
	<title>User Panel - Settings</title>

<!--include link file-->
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
            <h1 class="mb-4">USER BOOKING FORM</h1>

<!--submission form-->
<div class="col-lg-auto col-md-6 mb-5 px-4">
    <div class="bg-white rounded shadow p-4">
        <form method="POST">
        <div class="mb-3">
            <label class="form-label" style="font-weight: 500;">Name</label>
                <input type="text" id="name" name="name" class="form-control shadow-none" value="<?php echo $_SESSION['user_name']; ?>" readonly>
            </div>
          <div class="mb-3">
            <label class="form-label" style="font-weight: 500;">Room type</label>
                <select id="room" name="room" required class="form-select shadow-none">
                    <?php
                    $select_products = mysqli_query($con, "SELECT * FROM `room`");
                        if (mysqli_num_rows($select_products) > 0) {
                         while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                                            echo '<option value="' . $fetch_product['name'] . '">' . $fetch_product['name'] . '</option>';
                            }
                        }
                    ?>
                </select>
          </div>
            <div class="mb-3">
                <label class="form-label" style="font-weight: 500;">Date : </label>
                <input type="date" id="bookdate" name="bookdate" required class="form-control shadow-none">
            </div>
            <div class="mb-3">
                <label class="form-label" style="font-weight: 500;">Start Time : *After 8:00 A.M*</label>
                <input type="time" id="starttime" name="starttime" required class="form-control shadow-none" min="08:00" max="16:00">
            </div>
            <div class="mb-3">
                <label class="form-label" style="font-weight: 500;">End Time : *Before 4:00 P.M*</label>
                <input type="time" id="endtime" name="endtime" required class="form-control shadow-none" min="08:00" max="16:00">
            </div>

            <div class="mb-3">
            <label class="form-label" style="font-weight: 500;">Booking type : </label>
                <select class="form-select" id="booktype" name="booktype" required>
                    <option value="Class">Class</option>
                    <option value="Activities">Activities</option>
					<option value="Meetings">Meetings</option>
                    <option value="Other">Other - State in Messege</option>
                </select>
            </div>

            <div class="mb-3">
				<label class="form-label" style="font-weight: 500;">Total Students : *Max 100*</label>
				<input type="number" id="total_student" name="total_student" class="form-control shadow-none" required min="0" max="100">
			</div>


            <div class="mb-3">
                <label class="form-label" style="font-weight: 500;">Message : </label>
                <textarea id="note" name="note" class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
            </div>
            <button type="submit" name="send" class="btn text-white custom-bg mt-3">Send</button>
        </form>
    </div>
</div>




<!--fetch data from database-->
<?php
	//this query inserts a record in the ictbookings table
	//has form been submitted
	if($_SERVER['REQUEST_METHOD']== 'POST')
	{
		$error = array ();//initialize an error array
	
	//check for a name
	if (empty ($_POST['name']))
	{
		$error [] = 'You forgot to enter your name.';
	}
	else
	{
		$p = mysqli_real_escape_string ($con, trim($_POST['name']));
	}
	
	
	//check for room
	if (empty($_POST ['room']))
	{
		$error [] = 'You forgot to enter your room.';
	}
	else
	{
		$e = mysqli_real_escape_string($con, trim($_POST ['room']));
	}

  	//check for bookdate
	if (empty($_POST ['bookdate']))
	{
		$error [] = 'You forgot to enter your bookdate.';
	}
	else
	{
		$m = mysqli_real_escape_string($con, trim($_POST ['bookdate']));
	}

    //check for returndate
	if (empty($_POST ['starttime']))
	{
		$error [] = 'You forgot to enter your starttime.';
	}
	else
	{
		$st = mysqli_real_escape_string($con, trim($_POST ['starttime']));
	}

    //check for returndate
	if (empty($_POST ['endtime']))
	{
		$error [] = 'You forgot to enter your endtime.';
	}
	else
	{
		$et = mysqli_real_escape_string($con, trim($_POST ['endtime']));
	}

     //check for class
	if (empty($_POST ['booktype']))
	{
		$error [] = 'You forgot to enter your booktype.';
	}
	else
	{
		$bt = mysqli_real_escape_string($con, trim($_POST ['booktype']));
	}

     //check for class
    if (!empty($_POST['total_student'])) {
        $t = mysqli_real_escape_string($con, trim($_POST['total_student']));
    }

    if (!empty($_POST['note'])) {
        $n = mysqli_real_escape_string($con, trim($_POST['note']));
    }

	$check_query = "SELECT sr_no FROM booking 
                WHERE (bookdate = '$m' AND room = '$e')
                AND (
                    (starttime <= '$st' AND endtime > '$st')  -- Allow the new booking to start immediately after the previous one
                    OR
                    (starttime < '$et' AND endtime >= '$et')  -- Allow the new booking to end immediately before the next one
                )";


	$check_result = mysqli_query($con, $check_query);

	if (mysqli_num_rows($check_result) > 0) {
        $error[] = 'The selected time range is already booked. Please try again';
    }

    if (empty($error)) {
        $q = "INSERT INTO booking (sr_no, name, room, bookdate, starttime, endtime, booktype, total_student, note) VALUES('', '$p', '$e', '$m', '$st', '$et', '$bt', '$t', '$n')";
        $result = mysqli_query($con, $q);

        if ($result) {
            echo '<script>alert("Thank you for booking. Please check the status in 1 - 2 days."); window.location.href="bookingreceipt.php";</script>';
        } else {
            echo '<script>alert("System Error. Please try again.");</script>';
        }
    } else {
        // Display the error messages
        echo '<script>alert("' . implode('\n', $error) . '");</script>';
    }
	//end of it (result)
	mysqli_close($con); //close the database connection_aborted
	exit();
	} // end of the main submit conditional
	?>

</script>

</body>
</html>







            


<!--include scripts file-->
<?php
    require('inc/scripts.php');
?>


</body>
</html>