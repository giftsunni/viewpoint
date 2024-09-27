<?php
session_start(); // Start session at the beginning

// Unset all session variables
$_SESSION = array();


// Redirect to login page
header('location: ./login');
exit();
?>
