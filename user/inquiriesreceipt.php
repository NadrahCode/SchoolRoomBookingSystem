<!--includes the essential and database-->
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>User Dashboard</title> 

    <!--includes the bootstrap style-->
    <?php
    require('inc/links.php');
    ?>

    <!--includes specific CSS file-->
    <style>
        <?php
        require('css/common.css');
        ?>
    </style>
</head>
<body class="bg-light">
    <!--includes the nav bar-->
    <?php 
    require('inc/header.php');
    ?>

    <!--title-->
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p4 overflow-hidden">
                <br>


                <div id="tableToPrint">
                <!--list table-->
                <h4 class="mb-4">LATEST INQURIES</h4>
                <div class="table-responsive-md" style="height:auto; overflow-y: auto;">
                <table class="table table-hover border">
                        <thead>
                        <tr class="bg-dark text-light">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone No</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Messege</th>
                        </tr>
                    </thead>
                    <tbody>


                    <!--fetch data-->
                    <?php
                    	$q = "SELECT * FROM user_queries ORDER BY sr_no DESC LIMIT 1";
                        $data = @mysqli_query ($con, $q);

                        while($row=mysqli_fetch_assoc($data))

                                {
                                    echo '<tr>
                                    <td>'.$row['sr_no'].'</td>
                                    <td>'.$row['names'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td>'.$row['phone'].'</td>
                                    <td>'.$row['subjects'].'</td>
                                    <td>'.$row['messege'].'</td>
                                    </tr>';
                                }
                    ?>
                        
                    </tbody>
                    </table>
                </div>


                <a class="btn" href = "userinquriesform.php?id='.$row['sr_no'].'">Back</a></td>
                        <!-- JavaScript function for printing a specific part of the page -->
                        <button id="printButton" class="btn">Print Table</button>
                        <script>
                            document.getElementById('printButton').addEventListener('click', function () {
                                var printContent = document.getElementById('tableToPrint'); // Replace 'tableToPrint' with the ID of the part you want to print
                                var originalContent = document.body.innerHTML;

                                // Clone the part you want to print and append it to a new div
                                var printDiv = document.createElement('div');
                                printDiv.innerHTML = printContent.innerHTML;
                                document.body.innerHTML = printDiv.innerHTML;

                                // Print the new content
                                window.print();

                                // Check if the user canceled the print and restore the original content
                                if (window.onafterprint === null) {
                                    document.body.innerHTML = originalContent;
                                }
                            });
                        </script>

            </div>
        </div>
    </div>

    <!--include script-->
    <?php
    require('inc/scripts.php');
    ?>
</body>
</html>
