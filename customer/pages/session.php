<?php
//Start session
session_start();
// 5-Minute Session Expiry (Academic Req)
$expiry_time = 300; // 5 minutes in seconds
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $expiry_time)) {
    session_unset();
    session_destroy();
    header("location: ../index.php?msg=session_expired");
    exit();
}
$_SESSION['LAST_ACTIVITY'] = time();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
    header("location: index.php");
    exit();
}
$session_id=$_SESSION['user_id'];

// Fetch User Data for Global Use (BIT29)
include "dbcon.php";
$user_query = mysqli_query($con, "SELECT * FROM members WHERE user_id='$session_id'");
$user_data = mysqli_fetch_array($user_query);
?>