<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '') || $_SESSION['user_type'] !== 'customer') {
    header("location:../index.php");
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

?>