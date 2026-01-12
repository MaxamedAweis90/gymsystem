<?php
session_start();
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Gym System Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link href="../font-awesome/css/all.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<div id="header">
  <h1><a href="dashboard.html">Perfect Gym Admin</a></h1>
</div>

<?php include 'includes/topheader.php'?>
<?php $page='pending-members'; include 'includes/sidebar.php'?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Home</a> <a href="pending-members.php" class="current">Pending Requests</a> </div>
    <h1 class="text-center">Pending Member Requests <i class="fas fa-user-clock"></i></h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
      <div class='widget-box'>
          <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
            <h5>Pending Members Table</h5>
          </div>
          <div class='widget-content nopadding'>
	  
	  <?php
      include "dbcon.php";
      $qry="SELECT * FROM members WHERE status='Pending'";
      $cnt = 1;
      $result=mysqli_query($conn,$qry);

      if(mysqli_num_rows($result) > 0){
          echo"<table class='table table-bordered table-hover'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Fullname</th>
                  <th>Contact</th>
                  <th>Service</th>
                  <th>Plan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>";
              
            while($row=mysqli_fetch_array($result)){
                echo "<tr>
                <td><div class='text-center'>".$cnt."</div></td>
                <td><div class='text-center'>".$row['fullname']."</div></td>
                <td><div class='text-center'>".$row['contact']."</div></td>
                <td><div class='text-center'>".$row['services']."</div></td>
                <td><div class='text-center'>".$row['plan']." Month/s</div></td>
                <td><div class='text-center'>
                    <a href='actions/accept-member.php?id=".$row['user_id']."' class='btn btn-success btn-mini'><i class='fas fa-check'></i> Accept</a>
                    <a href='edit-memberform.php?id=".$row['user_id']."' class='btn btn-primary btn-mini'><i class='fas fa-edit'></i> View Full Details</a>
                </div></td>
                </tr>";
                $cnt++;
            }
            echo "</tbody></table>";
      } else {
          echo "<div class='alert alert-info text-center' style='margin:20px;'>No pending member requests found.</div>";
      }
      ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row-fluid">
  <div id="footer" class="span12"> <?php echo date("Y");?> &copy; Developed By BIT29 Group</div>
</div>

<script src="../js/jquery.min.js"></script> 
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/matrix.js"></script> 
</body>
</html>
