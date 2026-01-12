<?php 
session_start(); 

// Check if already logged in
if (isset($_SESSION['user_id']) && isset($_SESSION['user_type'])) {
    if ($_SESSION['user_type'] == 'customer') {
        header('location:pages/index.php');
        exit();
    } else if ($_SESSION['user_type'] == 'admin') {
        header('location:../admin/index.php');
        exit();
    } else if ($_SESSION['user_type'] == 'staff') {
        header('location:../staff/staff-pages/index.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password | Perfect Gym</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-login.css" />
    <link href="font-awesome/css/all.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style>
        body { background: #2e363f; }
        .alert { margin-top: 20px; }
    </style>
</head>
<body>
    <div id="loginbox">            
        <form class="form-vertical" method="POST">
            <div class="control-group normal_text"> <h3>Reset Password</h3></div>
            <p class="normal_text" style="font-size:12px; font-weight:400;">Enter your email address below and we will send you instructions on how to recover your password.</p>
            
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lo"><i class="fas fa-envelope"></i></span><input type="email" name="email" placeholder="E-mail address" required />
                </div>
            </div>

            <div class="form-actions">
                <span class="pull-left"><a href="index.php" class="btn btn-success">&laquo; Back to Login</a></span>
                <span class="pull-right"><button type="submit" name="recover" class="btn btn-info">Recover Account</button></span>
            </div>
        </form>
        <?php
        if(isset($_POST['recover'])){
            echo "<div class='alert alert-info'>Instruction has been sent to your email. (Simulation for Academic Project)</div>";
        }
        ?>
    </div>
    <script src="js/jquery.min.js"></script>  
    <script src="js/bootstrap.min.js"></script> 
</body>
</html>
