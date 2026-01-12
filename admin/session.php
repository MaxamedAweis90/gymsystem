<?php
/**
 * Admin Session Management
 * Fetches current admin user data for global use.
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '') || $_SESSION['user_type'] !== 'admin') {
    header("location:../admin_login.php");
    exit();
}

// 5 minutes inactive timeout
$timeout_duration = 300; 

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();     
    session_destroy();   
    header("Location: ../index.php"); 
    exit();
}
$_SESSION['LAST_ACTIVITY'] = time();

$session_id=$_SESSION['user_id'];
include "dbcon.php";
$user_query = mysqli_query($con, "SELECT * FROM admin WHERE user_id='$session_id'");
$user_data = mysqli_fetch_array($user_query);
?>
