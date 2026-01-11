<?php session_start();
include('dbcon.php'); 

// If already logged in as admin, go to dashboard
if (isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {
    header('location:admin/index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gym System Admin | Login</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-login.css" />
    <link href="font-awesome/css/all.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style>
        body { background: #2e363f; }
    </style>
</head>
<body>
    <div id="loginbox">            
        <form id="loginform" method="POST" class="form-vertical" action="#">
        <div class="control-group normal_text"> <h3>Gym Admin Portal</h3></div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="fas fa-user-shield"></i></span><input type="text" name="user" placeholder="Admin Username" required/>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="fas fa-lock"></i></span><input type="password" name="pass" placeholder="Admin Password" required />
                    </div>
                </div>
            </div>
            <div class="form-actions center">
                <button type="submit" class="btn btn-block btn-large btn-info" name="login">Admin Login</button>
            </div>
        </form>
        <?php
            if (isset($_POST['login'])) {
                $username = mysqli_real_escape_string($con, $_POST['user']);
                $password = mysqli_real_escape_string($con, $_POST['pass']);
                $password = md5($password);
                $query = mysqli_query($con, "SELECT * FROM admin WHERE password='$password' and username='$username'");
                $num_row = mysqli_num_rows($query);
                if ($num_row > 0) {
                    $row = mysqli_fetch_array($query);
                    $_SESSION['user_id']=$row['user_id'];
                    $_SESSION['user_type']='admin';
                    header('location:admin/index.php');
                } else {
                    echo "<div class='alert alert-danger'>Invalid Username and Password</div>";
                }
            }
        ?>
        <div class="pull-left"><a href="index.php"><h6>&laquo; Back to Home</h6></a></div>
        <div class="pull-right"><a href="staff/index.php"><h6>Staff Portal</h6></a></div>
    </div>
    <script src="js/jquery.min.js"></script>  
    <script src="js/bootstrap.min.js"></script> 
</body>
</html>
