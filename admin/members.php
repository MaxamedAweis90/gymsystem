<?php
$page='members';
$title = "Manage Members";
include 'includes/header.php';
?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Home</a> 
        <a href="members.php" class="current">Manage Members</a> 
    </div>
    <h1 class="text-center">Registered Members List <i class="fas fa-users"></i></h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

        <div class='widget-box'>
          <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
            <h5>Member Table</h5>
          </div>
          <div class='widget-content nopadding'>
            <?php include 'includes/message.php'; ?>
            <table class='table table-bordered table-striped data-table'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Full Name</th>
                  <th>Username</th>
                  <th>Gender</th>
                  <th>Contact Number</th>
                  <th>D.O.R</th>
                  <th>Address</th>
                  <th>Amount</th>
                  <th>Choosen Service</th>
                  <th>Plan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $qry="select * from members";
                  $result=mysqli_query($con,$qry);
                  $cnt = 1;
                  while($row=mysqli_fetch_array($result)){
                    echo "<tr>
                    <td><div class='text-center'>".$cnt."</div></td>
                    <td><div class='text-center'>".$row['fullname']."</div></td>
                    <td><div class='text-center'>".$row['username']."</div></td>
                    <td><div class='text-center'>".$row['gender']."</div></td>
                    <td><div class='text-center'>".$row['contact']."</div></td>
                    <td><div class='text-center'>".$row['dor']."</div></td>
                    <td><div class='text-center'>".$row['address']."</div></td>
                    <td><div class='text-center'>$".$row['amount']."</div></td>
                    <td><div class='text-center'>".$row['services']."</div></td>
                    <td><div class='text-center'>".$row['plan']." Month/s</div></td>
                    </tr>";
                    $cnt++;
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
