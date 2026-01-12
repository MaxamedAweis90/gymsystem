<?php
include '../session.php'; // Ensure session is active

include 'dbcon.php';
$id = $_GET['id'];

$qry = "UPDATE members SET status='Active' WHERE user_id='$id'";
$result = mysqli_query($conn,$qry);

if($result){
    $_SESSION['success_message'] = "Member request has been accepted!";
    header("Location: ../pending-members.php");
    exit();
} else {
    $_SESSION['error_message'] = "Error accepting request.";
    header("Location: ../pending-members.php");
    exit();
}
?>
