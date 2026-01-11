<?php
/**
 * Staff Session Management
 * Fetches current staff user data for global use.
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '') || $_SESSION['user_type'] !== 'staff') {
    header("location:../index.php");
    exit();
}
$session_id=$_SESSION['user_id'];
include "dbcon.php";
$user_query = mysqli_query($con, "SELECT * FROM staffs WHERE user_id='$session_id'");
$user_data = mysqli_fetch_array($user_query);
?>