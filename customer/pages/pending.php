<?php
include "dbcon.php";
include "session.php";

if($user_data['status'] == 'Active'){
    header('location:index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Account Pending | Gym System</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../css/matrix-style.css" />
    <link rel="stylesheet" href="../css/matrix-media.css" />
    <link href="../font-awesome/css/all.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style>
        body { background-color: #2e363f; }
        .container-pending { margin-top: 100px; text-align: center; color: white; }
        .widget-box { background: #fff; color: #333; padding: 40px; border-radius: 8px; max-width: 600px; margin: 0 auto; box-shadow: 0 10px 25px rgba(0,0,0,0.5); }
        .btn-payment { background-color: #28b779; color: white; padding: 15px 30px; font-size: 18px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; margin-top: 20px; transition: 0.3s; }
        .btn-payment:hover { background-color: #24a36b; color: white; }
        .status-badge { background-color: #ffb848; color: #fff; padding: 5px 15px; border-radius: 20px; font-size: 14px; margin-bottom: 20px; display: inline-block; }
        .logout-link { color: #ccc; margin-top: 20px; display: block; }
    </style>
</head>
<body>

<div class="container-pending">
    <div class="widget-box">
        <div class="status-badge">Account Status: Pending Registration</div>
        <h2>Welcome, <?php echo $user_data['fullname']; ?>!</h2>
        <p style="font-size: 16px; margin-top: 20px;">
            Your account is currently <strong>Pending Activation</strong>. 
            To access the gym system and your dashboard, please complete your registration.
        </p>
        
        <div style="margin: 30px 0; border-top: 1px solid #eee; padding-top: 20px;">
            <h4>Selected Plan: <?php echo $user_data['plan']; ?> Month(s)</h4>
            <h4>Service: <?php echo $user_data['services']; ?></h4>
            <p class="text-error">You will be activated immediately once authorized.</p>
        </div>

        <a href="pay-activation.php" class="btn-payment">
            <i class="fas fa-credit-card"></i> Pay Now & Activate
        </a>
        
        <a href="../logout.php" class="logout-link">Logout and return later</a>
    </div>
    
    <div style="margin-top: 20px; color: #777;">
        &copy; <?php echo date("Y"); ?> Gym Management System | BIT29
    </div>
</div>

</body>
</html>
