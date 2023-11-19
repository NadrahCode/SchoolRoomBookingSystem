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
		<div class="col-lg-10 ms-auto p4 overflow-hidden">
			<br>
			<h3 class="mb-4">BOOKING UPDATE</h3>

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

						// Check for room
						if (empty($_POST['room'])) {
							$error[] = 'You forgot to enter your room.';
						} else {
							$e = mysqli_real_escape_string($con, trim($_POST['room']));
						}

						// Check for book date
						if (empty($_POST['bookdate'])) {
							$error[] = 'You forgot to enter your book date.';
						} else {
							$m = mysqli_real_escape_string($con, trim($_POST['bookdate']));
						}

						// Check for start time
						if (empty($_POST['starttime'])) {
							$error[] = 'You forgot to enter your start time.';
						} else {
							$st = mysqli_real_escape_string($con, trim($_POST['starttime']));
						}

						// Check for end time
						if (empty($_POST['endtime'])) {
							$error[] = 'You forgot to enter your end time.';
						} else {
							$et = mysqli_real_escape_string($con, trim($_POST['endtime']));
						}

						// Check for class
						if (empty($_POST['booktype'])) {
							$error[] = 'You forgot to enter your book type.';
						} else {
							$bt = mysqli_real_escape_string($con, trim($_POST['booktype']));
						}

						// Check for total student
						$t = ""; // Initialize as an empty string
						if (!empty($_POST['total_student'])) {
							$t = mysqli_real_escape_string($con, trim($_POST['total_student']));
						}

						// Check for note
						$n = ""; // Initialize as an empty string
						if (!empty($_POST['note'])) {
							$n = mysqli_real_escape_string($con, trim($_POST['note']));
						}

						// Check for status
						if (empty($_POST['status'])) {
							$error[] = 'You forgot to enter your status.';
						} else {
							$s = mysqli_real_escape_string($con, trim($_POST['status']));
						}
					
						// If no problem occurred
						if (empty($error)) {
							$q = "SELECT sr_no FROM booking WHERE name = '$p' AND sr_no != $id";
							$result = @mysqli_query($con, $q); // Run the query

							if (mysqli_num_rows($result) == 0) {
								$q = "UPDATE booking SET room = '$e', bookdate = '$m', starttime = '$st', endtime = '$et', booktype = '$bt', total_student = '$t', note = '$n', status = '$s' WHERE sr_no = '$id' LIMIT 1";
								$result = @mysqli_query($con, $q); // Run the query

								if (mysqli_affected_rows($con) == 1) {
									echo '<script>alert("THE BOOKING HAS BEEN EDITED SUCCESSFULLY");
									window.location.href="BookingList.php";</script>';
								} else {
									echo '<script>alert("NO UPDATE HAS BEEN MADE. PLEASE TRY AGAIN.");
									window.location.href="BookingList.php";</script>';
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

					$q = "SELECT name, room, bookdate, starttime, endtime, booktype, total_student, note, status FROM booking WHERE sr_no = $id";
					$result = @mysqli_query($con, $q); // Run the query

					if (mysqli_num_rows($result) == 1) {
						// Get booking information
						$row = mysqli_fetch_array($result, MYSQLI_NUM);

						// Create the form
						echo '<form method="POST">

							<p><label class="label" for="room">Room* : </label>
							<input type="text" id="room" name="room" size="30" maxlength="50" value="'.$row[1].'"></p>

							<p><label class="label" for="bookdate">Book Date* : </label>
							<input type="date" id="bookdate" name="bookdate" size="30" maxlength="50" value="'.$row[2].'"></p>

							<p><label class="label" for="starttime">Start Time* : </label>
							<input type="time" id="starttime" name="starttime" size="30" maxlength="50" value="'.$row[3].'"></p>

							<p><label class="label" for="endtime">End Time* : </label>
							<input type="time" id="endtime" name="endtime" size="30" maxlength="50" value="'.$row[4].'"></p>

							<p><label class="label" for="booktype">Booking Type* : </label>
							<input type="text" id="booktype" name="booktype" size="30" maxlength="50" value="'.$row[5].'"></p>

							<p><label class="label" for="total_student">Total Student* : </label>
							<input type="number" id="total_student" name="total_student" size="30" maxlength="50" value="'.$row[6].'"></p>

							<p><label class="label" for="note">Note* : </label>
							<input type="textarea" id="note" name="note" size="30" maxlength="50" value="'.$row[7].'"></p>

							<label for="status">Status*:</label>
							<select name="status" id="status">
								<option value="Approved" ' . ($row[8] === 'Approved' ? 'selected' : '') . '>Approved</option>
								<option value="Not Approved" ' . ($row[8] === 'Not Approved' ? 'selected' : '') . '>Not Approved</option>
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
