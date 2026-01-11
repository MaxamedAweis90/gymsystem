<?php
$page = "dashboard";
$title = "Staff Dashboard";
include '../includes/staff_header.php';
?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="You're right here" class="tip-bottom"><i class="fas fa-home"></i> Home</a></div>
  </div>

  <div class="container-fluid">
    <div class="row-fluid">
    <div class="widget-box widget-plain">
      <div class="center">
        <ul class="stat-boxes2">
          <li>
            <div class="left peity_bar_neutral"><span><span style="display: none;">2,4,9,7,12,10,12</span>
              <canvas width="60" height="24"></canvas>
              </span>+10%</div>
            <div class="right"> <strong><?php 
                $result = mysqli_query($con, "SELECT COUNT(*) as count FROM members");
                $row = mysqli_fetch_array($result);
                echo $row['count'];
            ?></strong> Registered Members </div>
          </li>
          <li>
            <div class="left peity_line_neutral"><span><span style="display: none;">10,15,8,14,13,10,10,15</span>
              <canvas width="60" height="24"></canvas>
              </span>17.8%</div>
            <div class="right"> <strong>$<?php 
                $result = mysqli_query($con, "SELECT SUM(amount) as total FROM members");
                $row = mysqli_fetch_array($result);
                echo $row['total'] ? $row['total'] : 0;
            ?></strong> Total Earnings </div>
          </li>
          <li>
            <div class="left peity_bar_bad"><span><span style="display: none;">3,5,6,16,8,10,6</span>
              <canvas width="60" height="24"></canvas>
              </span>-40%</div>
            <div class="right"> <strong><?php 
                $result = mysqli_query($con, "SELECT COUNT(*) as count FROM staffs WHERE designation='Trainer'");
                $row = mysqli_fetch_array($result);
                echo $row['count'];
            ?></strong> Active Trainers</div>
          </li>
          <li>
            <div class="left peity_line_good"><span><span style="display: none;">12,6,9,23,14,10,17</span>
              <canvas width="60" height="24"></canvas>
              </span>+5%</div>
            <div class="right"> <strong><?php 
                $result = mysqli_query($con, "SELECT COUNT(*) as count FROM equipment");
                $row = mysqli_fetch_array($result);
                echo $row['count'];
            ?></strong> Gym Equipments </div>
          </li>
        </ul>
      </div>
    </div>
    </div>

    <hr/>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="fas fa-bullhorn"></i></span>
            <h5>Latest Announcements</h5>
          </div>
          <div class="widget-content nopadding">
            <ul class="recent-posts">
              <?php
                $qry="SELECT * FROM announcements ORDER BY id DESC LIMIT 5";
                $result=mysqli_query($con,$qry);
                while($row=mysqli_fetch_array($result)){
                  echo "<li>";
                  echo "<div class='user-thumb'> <img width='40' height='40' alt='User' src='../../img/profile/default_user.png'> </div>";
                  echo "<div class='article-post'>"; 
                  echo "<span class='user-info'> By: Admin / Date: ".$row['date']." </span>";
                  echo "<p><a href='#'>".$row['message']."</a> </p>";
                  echo "</div>";
                  echo "</li>";
                }
              ?>
              <li class="text-center" style="padding:10px;">
                <button class="btn btn-warning btn-mini">View All</button>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="fas fa-tasks"></i></span>
            <h5>Customer To-Do List</h5>
          </div>
          <div class="widget-content">
            <div class="todo">
              <ul>
              <?php
                $qry="SELECT * FROM todo ORDER BY id DESC LIMIT 8";
                $result=mysqli_query($con,$qry);
                while($row=mysqli_fetch_array($result)){ ?>
                <li class='clearfix'> 
                    <div class='txt'> <?php echo $row["task_desc"]?> <?php if ($row["task_status"] == "Pending") { echo '<span class="by label label-info">Pending</span>';} else { echo '<span class="by label label-success">In Progress</span>'; }?></div>
                </li>
               <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include '../includes/footer.php'; ?>
