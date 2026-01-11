<?php
/**
 * BIT29 Global Header
 * Centralizes head content, session management, and navigation.
 */
include "dbcon.php";
include "session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Gym System | <?php echo isset($title) ? $title : "Customer Portal"; ?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/all.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<style>
  .widget-box { border-radius: 8px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1); border: none; }
  .widget-title { background: #2e363f !important; color: #fff !important; border-bottom: none !important; }
  .widget-title h5 { font-weight: 700; color: #fff !important; }
  .user-thumb { border-radius: 50%; overflow: hidden; border: 2px solid #28b779; }
  .article-post { border-bottom: 1px solid #eee; padding: 15px 0; }
  .article-post:last-child { border-bottom: none; }
</style>
</head>
<body>

<div id="header">
  <h1><a href="index.php">Perfect Gym System</a></h1>
</div>

<?php 
// Include Top Navbar
include '../includes/topheader.php';

// Include Sidebar
include '../includes/sidebar.php';
?>
