<?php
//homework1

session_start();

// File modules/logout.php
session_destroy(); //Logout = Discard session


// Redirect to home page after logout
header('Location:../index.php');
// header('Location: ../index.php?m=login');
// print_r('You are logged out.');
?>
