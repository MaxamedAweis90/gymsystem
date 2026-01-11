<?php
$page='equipment';
$title = "Gym Equipment";
include 'includes/header.php';
?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Home</a> 
        <a href="equipment.php" class="current">Gym Equipment</a> 
    </div>
    <h1 class="text-center">Gym Equipment List <i class="fas fa-dumbbell"></i></h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

        <div class='widget-box'>
          <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
            <h5>Equipment Table</h5>
          </div>
          <div class='widget-content nopadding'>
	  
            <table class='table table-bordered table-striped data-table'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Equipment Name</th>
                  <th>Description</th>
                  <th>Quantity</th>
                  <th>Amount</th>
                  <th>Vendor</th>
                  <th>Contact</th>
                  <th>Address</th>
                  <th>Purchased Date</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $qry="select * from equipment";
                  $result=mysqli_query($con,$qry);
                  $cnt = 1;
                  while($row=mysqli_fetch_array($result)){
                    echo "<tr>
                    <td><div class='text-center'>".$cnt."</div></td>
                    <td><div class='text-center'>".$row['name']."</div></td>
                    <td><div class='text-center'>".$row['description']."</div></td>
                    <td><div class='text-center'>".$row['quantity']."</div></td>
                    <td><div class='text-center'>$".$row['amount']."</div></td>
                    <td><div class='text-center'>".$row['vendor']."</div></td>
                    <td><div class='text-center'>".$row['contact']."</div></td>
                    <td><div class='text-center'>".$row['address']."</div></td>
                    <td><div class='text-center'>".$row['date']."</div></td>
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
