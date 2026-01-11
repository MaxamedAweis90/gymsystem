<?php
$page = "reminder";
$title = "Reminders";
include '../includes/header.php';
?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="You're right here" class="tip-bottom"><i class="fas fa-home"></i> Home</a></div>
  </div>

  <div class="container-fluid">
    <div class="row-fluid">
	  
     <div class="span12">
        <?php
        $qry="SELECT reminder FROM members WHERE user_id='$session_id'";
        $result=mysqli_query($con,$qry);

        while($row=mysqli_fetch_array($result)){ 
            if($row['reminder'] == '1') { ?>
                <div class="alert alert-danger" role="alert" style="padding: 20px; border-radius: 8px;">
                    <h4 class="alert-heading"><i class="fas fa-exclamation-triangle"></i> URGENT PAYMENT NOTIFICATION</h4>
                    <p style="font-size: 14px;">This is to notify you that your current membership program is going to expire soon. Please clear up your payments before your due dates. <br>IT IS IMPORTANT THAT YOU CLEAR YOUR DUES ON TIME IN ORDER TO AVOID SERVICE DISRUPTIONS.</p>
                    <hr>
                    <p class="mb-0">We value you as our customer and look forward to continue serving you in the future.</p>
                </div>
            <?php } else { ?>
                <div class="alert alert-success" role="alert" style="padding: 20px; border-radius: 8px;">
                    <h4 class="alert-heading"><i class="fas fa-check-circle"></i> ALL CLEAR</h4>
                    <p>You have no pending reminders or notifications at this time. Keep up the great work at the gym!</p>
                </div>
            <?php } 
        } ?>
     </div>
     
    </div><!-- End of row-fluid -->
  </div><!-- End of container-fluid -->
</div>

<?php include '../includes/footer.php'; ?>
