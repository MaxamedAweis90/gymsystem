<div id="sidebar">
  <div class="user-profile" style="padding: 20px; text-align: center; background: #1f262d; border-bottom: 1px solid #3e444c;">
    <img src="../../img/profile/<?php echo $user_data['profile_pic']; ?>" style="width: 80px; height: 80px; border-radius: 50%; border: 3px solid #28b779; margin-bottom: 10px;">
    <h5 style="color: #fff; margin: 0; font-size: 14px;"><?php echo $user_data['fullname']; ?></h5>
    <span style="color: #28b779; font-size: 11px; text-transform: uppercase; font-weight: 700;">Gym Member</span>
  </div>
  <ul>
    <li class="<?php if($page=='dashboard'){ echo 'active'; }?>"><a href="index.php"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
    <li class="<?php if($page=='todo'){ echo 'active'; }?>"> <a href="to-do.php"><i class="fas fa-list-ul"></i> <span>My Tasks</span></a></li>
    <li class="<?php if($page=='reminder'){ echo 'active'; }?>"><a href="customer-reminder.php"><i class="fas fa-clock"></i> <span>Reminders</span></a></li>
    <li class="<?php if($page=='announcement'){ echo 'active'; }?>"><a href="announcement.php"><i class="fas fa-bullhorn"></i> <span>Announcements</span></a></li>
    <li class="<?php if($page=='report'){ echo 'active'; }?>"><a href="my-report.php"><i class="fas fa-file-invoice"></i> <span>My Reports</span></a></li>
  </ul>
</div>