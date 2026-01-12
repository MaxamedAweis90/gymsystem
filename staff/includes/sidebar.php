<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="fas fa-home"></i> Dashboard</a>
  <div class="user-profile" style="padding: 20px; text-align: center; background: #1f262d; border-bottom: 1px solid #3e444c;">
    <div style="width: 60px; height: 60px; line-height: 60px; border-radius: 50%; background: #28b779; color: #fff; font-size: 24px; margin: 0 auto 10px auto;">
        <i class="fas fa-user-tie"></i>
    </div>
    <h5 style="color: #fff; margin: 0; font-size: 14px;"><?php echo $user_data['fullname']; ?></h5>
    <span style="color: #28b779; font-size: 11px; text-transform: uppercase; font-weight: 700;"><?php echo $user_data['designation']; ?></span>
  </div>
  <ul>
    <li class="<?php if($page=='dashboard'){ echo 'active'; }?>"><a href="index.php"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
    <li class="submenu <?php if($page=='member'){ echo 'active open'; }?>"> <a href="#"><i class="fas fa-users"></i> <span>Manage Members</span></a>
      <ul>
        <li><a href="members.php">List All Members</a></li>
        <li><a href="member-entry.php">Member Entry Form</a></li>
        <!-- <li><a href="remove-member.php">Remove Member</a></li> -->
        <li><a href="edit-member.php">Update Member Details</a></li>
      </ul>
    </li>

    <li class="submenu <?php if($page=='equipment'){ echo 'active open'; }?>"> <a href="#"><i class="fas fa-dumbbell"></i> <span>Gym Equipment</span> </a>
      <ul>
        <li><a href="equipment.php">List Gym Equipment</a></li>
        <li><a href="equipment-entry.php">Add Equipment</a></li>
        <!-- <li><a href="remove-equipment.php">Remove Equipment</a></li> -->
        <li><a href="edit-equipment.php">Update Equipment Details</a></li>
      </ul>
    </li>
    <li class="<?php if($page=='membersts'){ echo 'active'; }?>"><a href="member-status.php"><i class="fas fa-eye"></i> <span>Member's Status</span></a></li>
    <li class="<?php if($page=='payment'){ echo 'active'; }?>"><a href="payment.php"><i class="fas fa-hand-holding-usd"></i> <span>Payments</span></a></li>
    <li class="<?php if($page=='attendance'){ echo 'active'; }?>"><a href="attendance.php"><i class="fas fa-calendar-alt"></i> <span>Manage Attendance</span></a></li>

  </ul>
</div>
<!--sidebar-menu-->