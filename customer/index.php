<?php session_start();
include('dbcon.php'); 

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
    <title>Customer Portal | Perfect Gym</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-login.css" />
    <link href="font-awesome/css/all.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style>
        :root { --primary: #28b779; --dark: #2e363f; }
        body { background: var(--dark); overflow-x: hidden; }
        #loginbox { width: 450px; margin-top: 50px; }
        .control-group.normal_text { background: var(--primary); color: #fff; padding: 20px; border-radius: 4px 4px 0 0; }
        .control-group.normal_text h3 { margin: 0; font-weight: 800; }
        .main_input_box input { height: 45px !important; }
        .btn-success { background-color: var(--primary); border: none; padding: 10px 20px; font-weight: 700; }
        .btn-info { background-color: #27a9e3; border: none; padding: 10px 20px; font-weight: 700; }
        .flip-link { font-weight: 600; cursor: pointer; }
        .remember-me { color: #ccc; margin: 10px 0; display: block; }
        .remember-me input { margin-right: 10px; }
    </style>
</head>
<body>

<div id="loginbox">            
    <!-- Login Form -->
    <form id="loginform" class="form-vertical" method="POST" action="#">
        <div class="control-group normal_text"> <h3>Customer Login</h3></div>
        
        <?php
        if (isset($_POST['login'])) {
            $username = mysqli_real_escape_string($con, $_POST['user']);
            $password = mysqli_real_escape_string($con, $_POST['pass']);
            $password = md5($password);
            
            $query = mysqli_query($con, "SELECT * FROM members WHERE password='$password' AND username='$username' AND (status='Active' OR status='Pending')");
            $num_row = mysqli_num_rows($query);
            
            if ($num_row > 0) {
                $row = mysqli_fetch_array($query);
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_type'] = 'customer';
                
                // Remember Me (Academic Req)
                if(isset($_POST['remember'])){
                    setcookie("user_login", $username, time() + (86400 * 30), "/"); // 30 days
                }

                if($row['status'] == 'Active') header('location:pages/index.php');
                else header('location:pages/pending.php');
            } else {
                echo "<div class='alert alert-danger'>Invalid Username/Password or Account Expired</div>";
            }
        }
        ?>

        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="fas fa-user-edit"></i></span><input type="text" name="user" placeholder="Username" value="<?php if(isset($_COOKIE['user_login'])) echo $_COOKIE['user_login']; ?>" required />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="fas fa-key"></i></span><input type="password" name="pass" placeholder="Password" required />
                </div>
            </div>
        </div>

        <label class="remember-me">
            <input type="checkbox" name="remember" <?php if(isset($_COOKIE['user_login'])) echo "checked"; ?>> Remember Me
        </label>

        <div class="form-actions">
            <span class="pull-left"><a class="flip-link btn btn-info" id="to-recover">Join the Gym!</a></span>
            <span class="pull-right"><button type="submit" name="login" class="btn btn-success">Login Now</button></span>
        </div>
        <div class="center" style="margin-top:10px;">
            <a href="forgot-password.php" style="color:#d59332; font-size:12px;">Forget Password?</a>
        </div>
        <div class="center" style="margin-top:10px;">
            <a href="../index.php" style="color:#777;">&laquo; Back to Home</a>
        </div>
    </form>

    <!-- Registration Form -->
    <form id="recoverform" action="pages/register-cust.php" method="POST" class="form-vertical" enctype="multipart/form-data">
        <div class="control-group normal_text"> <h3>Join Us Today</h3></div>
        <p class="normal_text" style="font-size:12px; font-weight:400;">Join BIT29's premium gym. Fill your details below.</p>

        <div class="controls"><div class="main_input_box">
            <span class="add-on bg_lo"><i class="fas fa-user"></i></span><input type="text" name="fullname" placeholder="Full Name" required />
        </div></div><br>

        <div class="controls"><div class="main_input_box">
            <span class="add-on bg_lo"><i class="fas fa-at"></i></span><input type="text" name="username" placeholder="Username" required />
        </div></div><br>

        <div class="controls"><div class="main_input_box">
            <span class="add-on bg_lo"><i class="fas fa-envelope"></i></span><input type="email" name="email" placeholder="Email Address" required />
        </div></div><br>

        <div class="controls"><div class="main_input_box">
            <span class="add-on bg_lo"><i class="fas fa-lock"></i></span><input type="password" name="password" placeholder="Password" required />
        </div></div><br>

        <div class="controls"><div class="main_input_box">
            <span class="add-on bg_lo"><i class="fas fa-phone"></i></span><input type="number" name="contact" placeholder="Phone Number" required />
        </div></div><br>

        <div class="controls"><div class="main_input_box">
            <span class="add-on bg_lo"><i class="fas fa-camera"></i></span><input type="file" name="profile_pic" accept="image/*" required />
        </div></div><p style="color:#ccc; font-size:10px; margin-left: 50px;">Upload Profile Picture (Required)</p>

        <div class="controls"><div class="main_input_box">
            <select name="gender" required><option value="Male" selected>Male</option><option value="Female">Female</option></select>
        </div></div><br>

        <div class="controls"><div class="main_input_box">
            <select name="plan" required><option disabled selected>Select Plan</option><option value="1">1 Month</option><option value="3">3 Months</option><option value="6">6 Months</option></select>
        </div></div><br>

        <div class="controls"><div class="main_input_box">
            <select name="services" required><option disabled selected>Select Service</option><option value="Fitness">Fitness</option><option value="Sauna">Sauna</option><option value="Cardio">Cardio</option></select>
        </div></div>

        <div class="form-actions">
            <span class="pull-left"><a class="flip-link btn btn-success" id="to-login">&laquo; Back to Login</a></span>
            <span class="pull-right">
                <button class="btn btn-warning" type="reset">Reset</button>
                <button class="btn btn-info" type="submit">Submit Membership</button>
            </span>
        </div>
    </form>
</div>           

<script src="js/jquery.min.js"></script>  
<script src="js/matrix.login.js"></script> 
<script src="js/bootstrap.min.js"></script> 
</body>
</html>
