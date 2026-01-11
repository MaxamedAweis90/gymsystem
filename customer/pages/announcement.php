<?php
$page = "announcement";
$title = "Announcements";
include '../includes/header.php';
?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="You're right here" class="tip-bottom"><i class="fas fa-home"></i> Home</a></div>
  </div>

  <div class="container-fluid">
    <div class="row-fluid">
	  
    <div class="span12">
    <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="fas fa-bullhorn"></i></span>
            <h5>Gym Announcement</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
              <?php
                $qry="select * from announcements ORDER BY id DESC";
                $result=mysqli_query($con,$qry);
                while($row=mysqli_fetch_array($result)){
              ?>
              <li>
                <div class='user-thumb'> <img width='50' height='50' alt='User' src='../../img/profile/default_user.png'> </div>
                <div class='article-post'> 
                  <span class='user-info'> <i class="fas fa-user-tie"></i> Admin / <i class="fas fa-calendar-alt"></i> <?php echo $row['date']; ?> </span>
                  <p><a href='#'><?php echo $row['message']; ?></a> </p>
                </div>
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div><!--end of span 12 -->
	  
    </div><!-- End of row-fluid -->
  </div><!-- End of container-fluid -->
</div>

<?php include '../includes/footer.php'; ?>
