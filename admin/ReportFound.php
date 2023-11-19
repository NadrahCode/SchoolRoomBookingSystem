
<!--include essential and database file-->
<?php
require('inc/essential.php');
require('inc/db_config.php');
adminLogin();

$room = ''; // Initialize the $room variable

if (isset($_POST['submit']) && !empty($_POST['room'])) {
    $room = mysqli_real_escape_string($con, $_POST['room']);

    // Calculate the total room count for the specific room name
    $totalRoomCountQuery = "SELECT COUNT(DISTINCT room) AS total_rooms FROM booking WHERE room = '$room'";
    $totalRoomCountResult = mysqli_query($con, $totalRoomCountQuery);
    $totalRoomCountRow = mysqli_fetch_assoc($totalRoomCountResult);
    $totalRoomCount = $totalRoomCountRow['total_rooms'];

    // Query to get the total users for the specific room name by date
    $totalUsersByDateQuery = "SELECT bookdate, COUNT(*) AS total_users
                             FROM booking
                             WHERE room = '$room'
                             GROUP BY bookdate
                             ORDER BY bookdate ASC";
    $totalUsersByDateResult = mysqli_query($con, $totalUsersByDateQuery);

    $totalUsersByRoomQuery = "SELECT room, COUNT(*) AS total_users
                             FROM booking
                             WHERE room = '$room'
                             GROUP BY room";
    $totalUsersByRoomResult = mysqli_query($con, $totalUsersByRoomQuery);

    // Calculate the best start time and end time for the specific room name
    $bestTimeQuery = "SELECT starttime, endtime, COUNT(*) AS total_bookings
    FROM booking
    WHERE room = '$room'
    GROUP BY starttime, endtime
    ORDER BY total_bookings DESC
    LIMIT 1";

    $bestTimeResult = mysqli_query($con, $bestTimeQuery);
    $bestTimeRow = mysqli_fetch_assoc($bestTimeResult);

    $bestStartTime = $bestTimeRow['starttime'];
    $bestEndTime = $bestTimeRow['endtime'];
    

    // Query to get the total users for each week
        $weeklyUsersQuery = "SELECT WEEK(bookdate) AS week, COUNT(*) AS total_users
        FROM booking
        WHERE room = '$room'
        GROUP BY week
        ORDER BY week ASC";

        $weeklyUsersResult = mysqli_query($con, $weeklyUsersQuery);

        // Query to get the total users for each month
        $monthlyUsersQuery = "SELECT DATE_FORMAT(bookdate, '%Y-%m') AS month, COUNT(*) AS total_users
        FROM booking
        WHERE room = '$room'
        GROUP BY month
        ORDER BY month ASC";

        $monthlyUsersResult = mysqli_query($con, $monthlyUsersQuery);

        
        // Get the total booking count
        $totalBookingCount = $totalRoomCount; // Assuming $totalRoomCount holds the total booking count.

        // Define the fixed number (e.g., 88 teachers)
        $fixedNumber = 88;

        // Calculate the percentage
        $percentage = ($totalBookingCount / $fixedNumber) * 100;



}  else {
    // Display an error popup message and lead back to the report.php page
    echo "<script>alert('Please provide a room name to generate the analysis report.');</script>";
    echo "<script>window.location.href = 'Report.php';</script>";
    exit; // Terminate the script
}
?>



<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="with=device-with, initial-scale=1.0">
	<title>Admin Report</title>

<!--include links file-->
<?php
require('inc/links.php');
?>

<!--include spesific css file-->
<style>
    <?php
require('css/common.css');
require('css/print.css');
    ?>
</style>

</head>
<body class="bg-light">
<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-20 ms-auto p4 overflow-hidden">
            <br> <br>
            <h1 class="mb-4" style="text-align: center;"><?php echo htmlspecialchars($_POST['room']); ?> REPORT</h1>
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">


            <!-- Display the total users for the specific room name -->
            <h2>Total Booking for '<?php echo $room; ?>'</h2>
            <div class="table-responsive-md">
                <table class="table table-hover border">
                    <thead class="sticky-top">
                    <tr class="bg-dark text-light">
                        <th scope="col">Room Name</th>
                        <th scope="col">Total Booking</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($row = @mysqli_fetch_array($totalUsersByRoomResult, MYSQLI_ASSOC)) {
                        echo '<tr>
                                <td>' . $row['room'] . '</td>
                                <td>' . $row['total_users'] . '</td>
                            </tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <br>
            <!-- Display the total users for the specific room name by date -->
            <h2>Total Booking for '<?php echo $room; ?>' by Date</h2>
            <div class="table-responsive-md">
                <table class="table table-hover border">
                    <thead class="sticky-top">
                    <tr class="bg-dark text-light">
                        <th scope="col">Date</th>
                        <th scope="col">Total Booking</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($row = @mysqli_fetch_array($totalUsersByDateResult, MYSQLI_ASSOC)) {
                        echo '<tr>
                                <td>' . $row['bookdate'] . '</td>
                                <td>' . $row['total_users'] . '</td>
                            </tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <br>
            <!-- Display the best start time and end time for the specific room name -->
            <h2>Best Start Time and End Time for '<?php echo $room; ?>'</h2>
            <div class="table-responsive-md">
                <table class="table table-hover border">
                    <thead class="sticky-top">
                        <tr class="bg-dark text-light">
                            <th scope="col">Best Start Time</th>
                            <th scope="col">Best End Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $bestStartTime; ?></td>
                            <td><?php echo $bestEndTime; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br><br><br>
            <h2>Total Weekly Booking for '<?php echo $room; ?>'</h2>
            <canvas id="weeklyChart" width="1000" height="200"></canvas>
            <br>
            <h2>Total Monthly Booking for '<?php echo $room; ?>'</h2>
            <canvas id="monthlyChart" width="1000" height="200"></canvas>
            <br>
            <a class="btn" href = "Report.php?id='.$row['sr_no'].'">Back</a></td>
            <button id="printButton" class="btn">Print Table</button>
            </div>
        </div>
    </div>


<script>
    // Weekly users data
    var weeklyData = {
        labels: [],
        datasets: [{
            label: 'Weekly Booking',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            data: []
        }]
    };

    <?php while ($row = @mysqli_fetch_array($weeklyUsersResult, MYSQLI_ASSOC)) { ?>
        weeklyData.labels.push('Week ' + <?php echo $row['week']; ?>);
        weeklyData.datasets[0].data.push(<?php echo $row['total_users']; ?>);
    <?php } ?>

    // Monthly users data
    var monthlyData = {
        labels: [],
        datasets: [{
            label: 'Monthly Booking',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1,
            data: []
        }]
    };

    <?php while ($row = @mysqli_fetch_array($monthlyUsersResult, MYSQLI_ASSOC)) { ?>
        monthlyData.labels.push('<?php echo date('F', strtotime($row['month'])); ?>');
        monthlyData.datasets[0].data.push(<?php echo $row['total_users']; ?>);
    <?php } ?>

// Set the canvas dimensions for the weekly chart
var weeklyContext = document.getElementById('weeklyChart').getContext('2d');
var weeklyChart = new Chart(weeklyContext, {
    type: 'bar',
    data: weeklyData,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Set the canvas dimensions for the monthly chart
var monthlyContext = document.getElementById('monthlyChart').getContext('2d');
var monthlyChart = new Chart(monthlyContext, {
    type: 'bar',
    data: monthlyData,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

</script>


<script>
    document.getElementById('printButton').addEventListener('click', function() {
        // Apply print styles using the 'print-styles' class
        document.body.classList.add('print-styles');
        window.print();
        
        // Remove print styles after printing
        document.body.classList.remove('print-styles');
    });
</script>





<!--include scripts file-->
<?php
    require('inc/scripts.php');
?>


</body>
</html>