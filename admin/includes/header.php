<?php
/**
 * BIT29 Admin Global Header
 */
include "session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Gym System Admin | <?php echo isset($title) ? $title : "Control Panel"; ?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/fullcalendar.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/all.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

<style>
  .widget-box { border-radius: 8px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1); border: none; }
  .widget-title { background: #2e363f !important; color: #fff !important; border-bottom: none !important; }
  .widget-title h5 { font-weight: 700; color: #fff !important; }
  .user-profile { background: #1f262d; border-bottom: 1px solid #3e444c; padding: 20px; text-align: center; }
  .quick-actions li { border-radius: 8px; transition: transform 0.2s; }
  .quick-actions li:hover { transform: translateY(-5px); }
</style>
<?php echo isset($extra_head) ? $extra_head : ""; ?>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="index.php">Perfect Gym Admin</a></h1>
</div>

<?php 
include 'includes/topheader.php';
include 'includes/sidebar.php';
?>
