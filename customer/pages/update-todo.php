<?php
$page = "todo";
$title = "Update Task";
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
          <div class="widget-title"> <span class="icon"> <i class="fas fa-edit"></i> </span>
            <h5>Update To-Do Lists</h5>
          </div>
   
          <div class="widget-content nopadding">
            <?php
              $id=$_GET['id'];
              $qry= "select * from todo where id='$id'";
              $result=mysqli_query($con,$qry);
              while($row=mysqli_fetch_array($result)){
            ?> 
            <form id="form-wizard" class="form-horizontal" action="actions/modified-todo.php" method="POST">
              <div id="form-wizard-1" class="step">
                <div class="control-group">
                    <label class="control-label">Please Enter Your Task :</label>
                    <div class="controls">
                        <input type="text" class="span11" name="task_desc" value='<?php echo $row['task_desc']; ?>' />
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Please Select a Status:</label>
                    <div class="controls">
                        <select name="task_status" required="required" id="select">
                        <option value="In Progress" <?php if($row['task_status'] == 'In Progress') echo 'selected'; ?>>In Progress</option>
                        <option value="Pending" <?php if($row['task_status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input id="add" class="btn btn-primary" type="submit" value="Save Changes" />
                </div>
              </div>
            </form>
            <?php } ?>
          </div><!--end of widget-content -->
        </div><!--end of widget box-->
      </div><!--end of span 12 -->
	  
    </div><!-- End of row-fluid -->
  </div><!-- End of container-fluid -->
</div>

<?php include '../includes/footer.php'; ?>
