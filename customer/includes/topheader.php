<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav right">
    <li class="dropdown" id="profile-messages" >
        <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle">
            <img src="../../img/profile/<?php echo $user_data['profile_pic']; ?>" style="width: 25px; height: 25px; border-radius: 50%; border: 1px solid #28b779; margin-top: -3px; margin-right: 5px;">
            <span class="text">Welcome, <?php echo $user_data['fullname']; ?></span><b class="caret"></b>
        </a>
      <ul class="dropdown-menu">
        <li><a href="../pages/my-report.php"><i class="icon-user"></i> My Report</a></li>
        <li class="divider"></li>
        <li><a href="to-do.php"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider "></li>
        <li><a href="../logout.php" ><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    
    <li class=""><a title="" href="../logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>