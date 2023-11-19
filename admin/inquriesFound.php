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
	<title>Admin Panel - Settings</title>

<!--include links file-->
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
            <h1 class="mb-4">USER INQURIES LIST</h1>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                <br>

                <!--table list-->
                <div id="tableToPrint">
                <div class="table-responsive-md" style="height:500px; overflow-y: scroll;">
                <table class="table table-hover border">
                        <thead class="sticky-top">
                        <tr class="bg-dark text-light">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col" >Phone No</th>
                        <th scope="col" >Subject</th>
                        <th scope="col" >Messege</th>
                        <th scope="col" >Status</th>
                        <th scope="col" >Update</th>
                        <th scope="col" >Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    </div>
                    

                    <?php
                        //fetch data from user_queries
                        $in=$_POST['names'];
                        $in= mysqli_real_escape_string($con,$in);

                        //make the query
                        $q = "SELECT sr_no, names,email,phone,
                        subjects,messege,status
                        FROM user_queries WHERE names = '$in' ORDER BY sr_no";

                        //run the query and assign it to the variable
                        $result = @mysqli_query($con,$q);
                    	while($row=@mysqli_fetch_array($result, MYSQLI_ASSOC))

                                {
                                    echo '<tr>
                                    <td>'.$row['sr_no'].'</td>
                                    <td>'.$row['names'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td>'.$row['phone'].'</td>
                                    <td>'.$row['subjects'].'</td>
                                    <td>'.$row['messege'].'</td>
                                    <td>'.$row['status'].'</td>
                                    <td align = "center"><a class="btn" href = "inquriesUpdate.php?id='.$row['sr_no'].'">Update✍🏻</a></td>
                                    <td align = "center"><a class="btn" href = "inquriesDelete.php?id='.$row['sr_no'].'">Delete🗑️</a></td>
                                    </tr>';
                                }
                            
                    
                    ?>
                        
                    </tbody>
                    </table>
                </div>

                <a class="btn" href = "inquriesList.php?id='.$row['sr_no'].'">Back</a></td>
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
    </div>
</div>

<!--include scripts file-->
<?php
    require('inc/scripts.php');
?>


</body>
</html>