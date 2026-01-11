<?php
$page = "dashboard";
$title = "Dashboard";
include '../includes/header.php';
?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="You're right here" class="tip-bottom"><i class="fas fa-home"></i> Home</a></div>
    <h1 class="text-center">Welcome Back, <?php echo $user_data['fullname']; ?>! <i class="fas fa-smile text-warning"></i></h1>
  </div>

  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
	  
      <div class="span6">
       <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="fas fa-tasks"></i></span>
            <h5>My Personal To-Do List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class='table table-striped table-bordered'>
              <thead>
                <tr>
                  <th>Task Description</th>
                  <th>Status</th>
                  <th width="15%">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $qry="SELECT * FROM todo WHERE user_id='".$_SESSION['user_id']."'";
                $result=mysqli_query($con,$qry);
                while($row=mysqli_fetch_array($result)){
                ?>
                <tr>
                  <td class='taskDesc'><i class='fas fa-plus-circle text-success'></i> <?php echo $row['task_desc']; ?></td>
                  <td class='taskStatus'><span class='label label-info'><?php echo $row['task_status']; ?></span></td>
                  <td class='taskOptions'>
                    <a href='update-todo.php?id=<?php echo $row['id']; ?>' class='btn btn-primary btn-mini'><i class='fas fa-edit'></i></a>  
                    <a href='actions/remove-todo.php?id=<?php echo $row['id']; ?>' class='btn btn-danger btn-mini'><i class='fas fa-trash'></i></a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

	  <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2">
            <span class="icon"><i class="fas fa-bullhorn"></i></span>
            <h5>Latest Gym Announcements</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
              <?php
                $qry="select * from announcements ORDER BY id DESC LIMIT 5";
                $result=mysqli_query($con,$qry);
                while($row=mysqli_fetch_array($result)){
              ?>
              <li>
                <div class='user-thumb'> <img width='40' height='40' alt='User' src='../../img/profile/default_user.png'> </div>
                <div class='article-post'>
                  <span class='user-info'> <i class="fas fa-user-tie"></i> Admin / <i class="fas fa-calendar-alt"></i> <?php echo $row['date']; ?> </span>
                  <p><a href='#'><?php echo $row['message']; ?></a> </p>
                </div>
              </li>
              <?php } ?>
              <li class="text-center" style="padding:10px;">
                <a href="announcement.php" class="btn btn-warning btn-mini">View All Announcements</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
	  
    </div>
  </div>
</div>

<?php include '../includes/footer.php'; ?>
