<?php
$page='dashboard';
$title = "Admin Dashboard";

// Capture extra scripts for the head
ob_start();
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
<script type="text/javascript">  
google.charts.load('current', {'packages':['corechart', 'bar']});  
google.charts.setOnLoadCallback(drawCharts);  

function drawCharts() {
    drawServicesChart();
    drawBarChart();
    drawEarningsChart();
    drawGenderChart();
    drawDesignationChart();
}

function drawServicesChart() {
    var data = google.visualization.arrayToDataTable([  
        ['Services', 'Number'],  
        <?php  
        include "dbcon.php";
        $qry="SELECT services, count(*) as number FROM members GROUP BY services";
        $result=mysqli_query($con,$qry);
        while($row = mysqli_fetch_array($result)) {
            echo "['".$row["services"]."', ".$row["number"]."],";
        }
        ?>  
    ]);  
    var options = { pieHole: 0.4 };
    var chart = new google.visualization.PieChart(document.getElementById('piechart_services'));  
    chart.draw(data, options);  
}

function drawBarChart() {
    var data = new google.visualization.arrayToDataTable([
        ['Services', 'Total Numbers'],
        <?php
        $query="SELECT services, count(*) as number FROM members GROUP BY services";
        $res=mysqli_query($con,$query);
        while($data=mysqli_fetch_array($res)){
            echo "['".$data['services']."',".$data['number']."],";   
        }
        ?> 
    ]);
    var options = {
        width: 710,
        legend: { position: 'none' },
        bars: 'vertical',
        axes: { x: { 0: { side: 'top', label: 'Total'} } },
        bar: { groupWidth: "100%" }
    };
    var chart = new google.charts.Bar(document.getElementById('top_x_div'));
    chart.draw(data, options);
}

function drawEarningsChart() {
    var data = new google.visualization.arrayToDataTable([
        ['Terms', 'Total Amount'],
        <?php
        $query1 = "SELECT SUM(amount) as earnings FROM members; ";
        $rezz=mysqli_query($con,$query1);
        $data_earnings=mysqli_fetch_array($rezz);
        echo "['Earnings',".($data_earnings['earnings'] ? $data_earnings['earnings'] : 0)."],";

        $query10 = "SELECT SUM(amount) as expenses FROM equipment";
        $res1000=mysqli_query($con,$query10);
        $data_expenses=mysqli_fetch_array($res1000);
        echo "['Expenses',".($data_expenses['expenses'] ? $data_expenses['expenses'] : 0)."],";
        ?> 
    ]);
    var options = {
        width: "100%",
        legend: { position: 'none' },
        bars: 'horizontal',
        axes: { x: { 0: { side: 'top', label: 'Total'} } },
        bar: { groupWidth: "100%" }
    };
    var chart = new google.charts.Bar(document.getElementById('top_y_div'));
    chart.draw(data, options);
}

function drawGenderChart() {
    var data = google.visualization.arrayToDataTable([  
        ['Gender', 'Number'],  
        <?php  
        $qry="SELECT gender, count(*) as enumber FROM members GROUP BY gender";
        $result3=mysqli_query($con,$qry);
        while($row = mysqli_fetch_array($result3)) {
            echo "['".$row["gender"]."', ".$row["enumber"]."],";
        }
        ?>  
    ]); 
    var options = { pieHole: 0.4 };
    var chart = new google.visualization.PieChart(document.getElementById('donutchart_gender'));
    chart.draw(data, options);
}

function drawDesignationChart() {
    var data = google.visualization.arrayToDataTable([  
        ['Designation', 'Number'],  
        <?php  
        $qry="SELECT designation, count(*) as snumber FROM staffs GROUP BY designation";
        $result5=mysqli_query($con,$qry);
        while($row = mysqli_fetch_array($result5)) {
            echo "['".$row["designation"]."', ".$row["snumber"]."],";
        }
        ?>  
    ]); 
    var options = { pieHole: 0.4 };
    var chart = new google.visualization.PieChart(document.getElementById('donutchart_staff'));
    chart.draw(data, options);
}
</script>
<?php
$extra_head = ob_get_clean();
include 'includes/header.php';
?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="You're right here" class="tip-bottom"><i class="fas fa-home"></i> Home</a></div>
  </div>

  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_ls"> <a href="index.php"> <i class="fas fa-user-check"></i> <span class="label label-important"><?php include'actions/dashboard-activecount.php'?></span> Active Members </a> </li>
        <li class="bg_lo span3"> <a href="members.php"> <i class="fas fa-users"></i><span class="label label-important"><?php include'dashboard-usercount.php'?></span> Registered Members</a> </li>
        <li class="bg_lg span3"> <a href="payment.php"> <i class="fas fa-dollar-sign"></i> Total Earnings: $<?php include'income-count.php' ?></a> </li>
        <li class="bg_lb span2"> <a href="announcement.php"> <i class="fas fa-bullhorn"></i><span class="label label-important"><?php include'actions/count-announcements.php'?></span>Announcements </a> </li>
        <li class="bg_ly span2"> <a href="pending-members.php"> <i class="fas fa-user-clock"></i><span class="label label-important"><?php include'actions/count-pending.php'?></span>New Requests </a> </li>
      </ul>
    </div>

    <div class="row-fluid">
       <?php include 'includes/message.php'; ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="fas fa-file-alt"></i></span>
          <h5>Services Report</h5>
        </div>
        <div class="widget-content">
          <div class="row-fluid">
            <div class="span8">
              <div id="top_x_div" style="width: 100%; height: 300px;"></div>
            </div>
            <div class="span4">
              <ul class="site-stats">
                <li class="bg_lh"><i class="fas fa-users"></i> <strong><?php include 'dashboard-usercount.php';?></strong> <small>Total Members</small></li>
                <li class="bg_lg"><i class="fas fa-user-clock"></i> <strong><?php include 'actions/dashboard-staff-count.php';?></strong> <small>Staff Users</small></li>
                <li class="bg_ls"><i class="fas fa-dumbbell"></i> <strong><?php include 'actions/count-equipments.php';?></strong> <small>Equipments</small></li>
                <li class="bg_ly"><i class="fas fa-wallet"></i> <strong>$<?php include 'actions/total-exp.php';?></strong> <small>Expenses</small></li>
                <li class="bg_lr"><i class="fas fa-user-ninja"></i> <strong><?php include 'actions/count-trainers.php';?></strong> <small>Trainers</small></li>
                <li class="bg_lb"><i class="fas fa-calendar-check"></i> <strong><?php include 'actions/count-attendance.php';?></strong> <small>Present Today</small></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="fas fa-chart-bar"></i></span>
          <h5>Earnings & Expenses Reports</h5>
        </div>
        <div class="widget-content">
          <div id="top_y_div" style="width: 100%; height: 200px;"></div>
        </div>
      </div>
    </div>

    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="fas fa-venus-mars"></i></span>
            <h5>Members by Gender</h5>
          </div>
          <div class="widget-content nopadding">
            <div id="donutchart_gender" style="width: 100%; height: 300px;"></div>
          </div>
        </div>
      </div>

      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="fas fa-id-card"></i></span>
            <h5>Staff by Designation</h5>
          </div>
          <div class="widget-content nopadding">
            <div id="donutchart_staff" style="width: 100%; height: 300px;"></div>
          </div>
        </div>   
      </div>
    </div>

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
                  echo "<div class='user-thumb'> <img width='40' height='40' alt='User' src='../img/profile/default_user.png'> </div>";
                  echo "<div class='article-post'>"; 
                  echo "<span class='user-info'> By: Admin / Date: ".$row['date']." </span>";
                  echo "<p><a href='#'>".$row['message']."</a> </p>";
                  echo "</div>";
                  echo "</li>";
                }
              ?>
              <li class="text-center" style="padding:10px;">
                <a href="announcement.php" class="btn btn-warning btn-mini">View All</a>
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

<?php include 'includes/footer.php'; ?>
