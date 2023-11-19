<?php
session_start();

if (!isset($_SESSION['userLogin']) || !$_SESSION['userLogin']) {
    // Redirect the user to the login page if not logged in
    header('Location: userindex.php'); 
    exit;
}
?>
