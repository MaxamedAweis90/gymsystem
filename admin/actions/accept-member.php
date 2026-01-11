<?php
session_start();
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}

include 'dbcon.php';
$id = $_GET['id'];

$qry = "UPDATE members SET status='Active' WHERE user_id='$id'";
$result = mysqli_query($conn,$qry);

if($result){
    echo "<script>alert('Member request has been accepted!'); window.location.href='../pending-members.php';</script>";
} else {
    echo "<script>alert('Error accepting request.'); window.location.href='../pending-members.php';</script>";
}
?>
