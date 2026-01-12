<div id="sidebar"><a href="#" class="visible-phone"><i class="fas fa-home"></i> Dashboard</a>
  <div class="user-profile" style="padding: 20px; text-align: center; background: #1f262d; border-bottom: 1px solid #3e444c;">
    <div style="width: 60px; height: 60px; line-height: 60px; border-radius: 50%; background: #28b779; color: #fff; font-size: 24px; margin: 0 auto 10px auto;">
        <i class="fas fa-user-shield"></i>
    </div>
    <h5 style="color: #fff; margin: 0; font-size: 14px;"><?php echo $user_data['name']; ?></h5>
    <span style="color: #28b779; font-size: 11px; text-transform: uppercase; font-weight: 700;">System Administrator</span>
  </div>
  <ul>
    <li class="<?php if($page=='dashboard'){ echo 'active'; }?>"><a href="index.php"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
    <li class="submenu <?php if($page=='members' || $page=='members-entry' || $page=='members-remove' || $page=='members-update'){ echo 'active open'; }?>"> <a href="#"><i class="fas fa-users"></i> <span>Manage Members</span> <span class="label label-important"></span></a>
      <ul>
        <li class="<?php if($page=='members'){ echo 'active'; }?>"><a href="members.php">List All Members</a></li>
        <li class="<?php if($page=='members-entry'){ echo 'active'; }?>"><a href="member-entry.php">Add Members</a></li>
        <li class="<?php if($page=='members-remove'){ echo 'active'; }?>"><a href="remove-member.php">Remove Members</a></li>
        <li class="<?php if($page=='members-update'){ echo 'active'; }?>"><a href="edit-member.php">Update Member Details</a></li>
      </ul>
    </li>

    <li class="submenu <?php if($page=='list-equip' || $page=='add-equip' || $page=='remove-equip' || $page=='update-equip'){ echo 'active open'; }?>"> <a href="#"><i class="fas fa-dumbbell"></i> <span>Gym Equipment</span> <span class="label label-important"><?php include 'dashboard-equipcount.php';?> </span></a>
    <ul>
        <li class="<?php if($page=='list-equip'){ echo 'active'; }?>"><a href="equipment.php"><i class="fas fa-arrow-right"></i> List Gym Equipment</a></li>
        <li class="<?php if($page=='add-equip'){ echo 'active'; }?>"><a href="equipment-entry.php"><i class="fas fa-arrow-right"></i> Add Equipment</a></li>
        <li class="<?php if($page=='remove-equip'){ echo 'active'; }?>"><a href="remove-equipment.php"><i class="fas fa-arrow-right"></i> Remove Equipment</a></li>
        <li class="<?php if($page=='update-equip'){ echo 'active'; }?>"><a href="edit-equipment.php"><i class="fas fa-arrow-right"></i> Update Equipment Details</a></li>
      </ul>
    </li>
    <li class="<?php if($page=='attendance'){ echo 'submenu active'; } else { echo 'submenu';}?>"> <a href="#"><i class="fas fa-calendar-alt"></i> <span>Attendance</span></a>
      <ul>
        <li class="<?php if($page=='attendance'){ echo 'active'; }?>"><a href="attendance.php"><i class="fas fa-arrow-right"></i> Check In/Out</a></li>
          <li class="<?php if($page=='view-attendance'){ echo 'active'; }?>"><a href="view-attendance.php"><i class="fas fa-arrow-right"></i> View</a></li>
        </ul>
      </li>

    
    <li class="<?php if($page=='manage-customer-progress'){ echo 'active'; }?>"><a href="customer-progress.php"><i class="fas fa-tasks"></i> <span>Manage Customer Progress</span></a></li>
    <li class="<?php if($page=='member-status'){ echo 'active'; }?>"><a href="member-status.php"><i class="fas fa-eye"></i> <span>Member's Status</span></a></li>
    <li class="<?php if($page=='payment'){ echo 'active'; }?>"><a href="payment.php"><i class="fas fa-hand-holding-usd"></i> <span>Payments</span></a></li>
    <li class="<?php if($page=='announcement'){ echo 'active'; }?>"><a href="announcement.php"><i class="fas fa-bullhorn"></i> <span>Announcement</span></a></li>
    <li class="<?php if($page=='staff-management'){ echo 'active'; }?>"><a href="staffs.php"><i class="fas fa-briefcase"></i> <span>Staff Management</span></a></li>
    <li class="submenu"> <a href="#"><i class="fas fa-file"></i> <span>Reports</span></a>
    <ul>
        <li class="<?php if($page=='chart'){ echo 'active'; }?>"><a href="reports.php"><i class="fas fa-arrow-right"></i> Chart Representation</a></li>
        <li class="<?php if($page=='member-repo'){ echo 'active'; }?>"><a href="members-report.php"><i class="fas fa-arrow-right"></i> Members Report</a></li>
        <li class="<?php if($page=='c-p-r'){ echo 'active'; }?>"><a href="progress-report.php"><i class="fas fa-arrow-right"></i> Customer Progress Report</a></li>
      </ul>
    </li>

     
   
  </ul>
</div>