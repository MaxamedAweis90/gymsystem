<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('location:../index.php');	
}
include "dbcon.php";
$user_id = $_SESSION['user_id'];

// Simulation of payment processing...
// In a real app, you would integrate with a payment gateway here.

$qry = "UPDATE members SET status='Active' WHERE user_id='$user_id'";
$result = mysqli_query($con, $qry);

if($result){
    echo "<script>alert('Payment Successful! Your account is now active.'); window.location.href='index.php';</script>";
} else {
    echo "<script>alert('Error activating account. Please contact support.'); window.location.href='pending.php';</script>";
}
?>
