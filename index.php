<?php session_start();
include('dbcon.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Perfect Gym | Premium Fitness Center</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link href="font-awesome/css/all.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style>
        :root {
            --primary: #28b779;
            --secondary: #27a9e3;
            --dark: #2e363f;
        }
        body { background: #f8f9fa; font-family: 'Open+Sans', sans-serif; margin: 0; padding: 0; }
        
        /* Header & Nav */
        header { background: var(--dark); padding: 10px 0; box-shadow: 0 2px 10px rgba(0,0,0,0.3); }
        .nav-container { display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        .logo h1 { color: #fff; margin: 0; font-size: 24px; font-weight: 800; }
        .logo span { color: var(--primary); }
        nav ul { list-style: none; margin: 0; padding: 0; display: flex; }
        nav ul li { margin-left: 30px; }
        nav ul li a { color: #fff; text-decoration: none; font-weight: 600; text-transform: uppercase; font-size: 13px; transition: 0.3s; }
        nav ul li a:hover { color: var(--primary); }

        /* Hero Section */
        .hero { 
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('img/demo/demo-image1.jpg'); 
            background-size: cover; 
            background-position: center;
            height: 80vh; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            color: #fff; 
            text-align: center;
        }
        .hero-content h2 { font-size: 56px; font-weight: 800; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 2px; }
        .hero-content p { font-size: 20px; max-width: 700px; margin: 0 auto 30px; opacity: 0.9; }
        .btn-cta { background: var(--primary); color: #fff; padding: 15px 40px; border-radius: 50px; font-weight: 700; text-transform: uppercase; text-decoration: none; border: 2px solid var(--primary); transition: 0.3s; }
        .btn-cta:hover { background: transparent; color: var(--primary); text-decoration: none;}

        /* Sidebar & Content area (Teacher bit29 req) */
        .main-container { display: flex; max-width: 1200px; margin: 50px auto; padding: 0 20px; }
        aside { width: 250px; padding-right: 40px; }
        .sidebar-widget { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin-bottom: 30px; }
        .sidebar-widget h4 { border-bottom: 2px solid var(--primary); padding-bottom: 10px; margin-bottom: 15px; font-size: 18px; }
        .sidebar-widget li { margin-bottom: 10px; list-style: none; }
        .sidebar-widget a { color: #555; text-decoration: none; }
        
        .content-area { flex: 1; }
        .section-title { font-size: 32px; font-weight: 800; margin-bottom: 30px; position: relative; padding-bottom: 15px; }
        .section-title::after { content: ''; position: absolute; left: 0; bottom: 0; width: 60px; height: 4px; background: var(--primary); }

        .feature-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; }
        .feature-box { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-left: 5px solid var(--primary); }
        .feature-box i { font-size: 40px; color: var(--primary); margin-bottom: 15px; display: block; }
        .feature-box h3 { margin-bottom: 15px; }

        footer { background: var(--dark); color: #ccc; padding: 40px 0; text-align: center; margin-top: 50px; }
    </style>
</head>
<body>

<header>
    <div class="nav-container">
        <div class="logo"><h1>PERFECT <span>GYM</span></h1></div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <?php if($_SESSION['user_type'] == 'admin'): ?>
                        <li><a href="admin/index.php">Admin Dashboard</a></li>
                    <?php elseif($_SESSION['user_type'] == 'staff'): ?>
                        <li><a href="staff/staff-pages/index.php">Staff Dashboard</a></li>
                    <?php else: ?>
                        <li><a href="customer/pages/index.php">Member Dashboard</a></li>
                    <?php endif; ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="customer/index.php">Join Now</a></li>
                    <li><a href="customer/index.php">Member Login</a></li>
                    <li><a href="staff/index.php">Staff Portal</a></li>
                <?php endif; ?>
                <li><a href="index.php#plans">Plans</a></li>
            </ul>
        </nav>
    </div>
</header>

<section class="hero">
    <div class="hero-content">
        <h2>Unleash Your Potential</h2>
        <p>Join the most advanced fitness community in the city. Professional trainers, state-of-the-art equipment, and personalized plans.</p>
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="<?php 
                echo ($_SESSION['user_type'] == 'admin') ? 'admin/index.php' : 
                     (($_SESSION['user_type'] == 'staff') ? 'staff/staff-pages/index.php' : 'customer/pages/index.php'); 
            ?>" class="btn-cta">Back to My Dashboard</a>
        <?php else: ?>
            <a href="customer/index.php" class="btn-cta">Start Your Journey</a>
        <?php endif; ?>
    </div>
</section>

<div class="main-container">
    <aside>
        <div class="sidebar-widget">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="#"><i class="fas fa-chevron-right"></i> Our Services</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> Expert Trainers</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> Success Stories</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> Contact Us</a></li>
            </ul>
        </div>
        <div class="sidebar-widget">
            <h4>Latest News</h4>
            <p style="font-size: 13px; color: #777;">New Yoga sessions starting this Monday. Book your slot now!</p>
        </div>
    </aside>

    <main class="content-area">
        <h2 class="section-title">Why Choose Us?</h2>
        <div class="feature-grid">
            <div class="feature-box">
                <i class="fas fa-dumbbell"></i>
                <h3>Modern Equipment</h3>
                <p>We provide the latest machines and weights to ensure you have everything needed for a perfect workout.</p>
            </div>
            <div class="feature-box">
                <i class="fas fa-user-ninja"></i>
                <h3>Expert Trainers</h3>
                <p>Our certified professionals are here to guide you through every step of your fitness transformation.</p>
            </div>
            <div class="feature-box">
                <i class="fas fa-clock"></i>
                <h3>24/7 Access</h3>
                <p>Work out on your own schedule. Our gym is open around the clock for all active members.</p>
            </div>
            <div class="feature-box">
                <i class="fas fa-heartbeat"></i>
                <h3>Health Tracking</h3>
                <p>Monitor your progress with our integrated health tracking tools and regular checkups.</p>
            </div>
        </div>
    </main>
</div>

<footer>
    <div class="container">
        <p>&copy; <?php echo date("Y"); ?> PERFECT GYM MANAGEMENT SYSTEM. Developed by BIT29 Group.</p>
        <p style="font-size: 12px; opacity: 0.6;">All rights reserved. Unauthorized copying prohibited.</p>
    </div>
</footer>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
