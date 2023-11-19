<?php
session_start();

// Unset or remove the session variables
unset($_SESSION['user_name']);
unset($_SESSION['user_role']);

// Display a message
echo '<script>alert("THANK YOU FOR USING SCHOOLROOMBOOKINGSYSTEM");</script>';

// Redirect the user to a specific page (e.g., index.php) after a short delay
header('Refresh: 0; URL=userindex.php'); // Redirect after 2 seconds
exit;
?>