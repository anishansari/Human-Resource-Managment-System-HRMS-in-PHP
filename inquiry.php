<?php include('header.php');?>
<?php
  include_once('controller/connect.php');
  
  $dbs = new database();
  $db=$dbs->connection();

  $inquiry = mysqli_query($db,"SELECT i.*,e.FirstName,e.LastName FROM inquiry i JOIN employee e on i.EmpId=e.EmployeeId");
  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    mysqli_query($db,"delete from inquiry where Id='$id'");
    //header('location:inquiry.php');exit;
    echo "<script>window.location='inquiry.php';</script>";
  }
  
?>
<ol class="breadcrumb" style="margin: 10px 0px ! important;">
    <li class="breadcrumb-item"><a href="Home.php">Home</a><i class="fa fa-angle-right"></i>Leave<i class="fa fa-angle-right"></i>Leave</li>
</ol>
<form method="POST">
<div class="validation-form" style="margin-bottom: 35px;margin-top: 10px;">
<h2>Employee Inquiry</h2>
<div class="row" style="color: white; margin-right: 0; margin-left: 0;">
  <div class="col-md-1" style="background-color: red;">
    <h5>ID</h5>
  </div>
  <div class="col-md-2" style="background-color: red;">
    <h5>Date</h5>
  </div>
  <div class="col-md-1" style="background-color: red;">
    <h5>Emp ID</h5>
  </div>
  <div class="col-md-2" style="background-color: red;">
    <h5>Name</h5>
  </div>
  <div class="col-md-5" style="background-color: red;">
    <h5>Query</h5>
  </div>
  <div class="col-md-1" style="background-color: red;">
    <h5>Action</h5>
  </div>
</div>

    <?php $i=1; while($row = mysqli_fetch_assoc($inquiry)) { //print_r($row);exit();
      $name = ucfirst($row['FirstName']." ".$row['LastName']);
      ?>
<div class="row" style="margin-right: 0; margin-left: 0;">
  <div class="col-md-1">
    <h5><?php $i=$i; echo $i; $i++;?></h5>
  </div>
  <div class="col-md-2">
    <h5><?php echo(isset($row['Date']))?$row['Date']:"";?></h5>
  </div>
  <div class="col-md-1">
    <h5><?php echo(isset($row['EmpId']))?$row['EmpId']:"";?></h5>
  </div>
  <div class="col-md-2">
    <h5><?php echo(isset($name))?$name:"";?></h5>
  </div>
  <div class="col-md-5">
    <h5><?php echo(isset($row['Message']))?$row['Message']:"";?></h5>
  </div>
  <div class="col-md-1">
    <h5><a href="?id=<?php echo $row['Id'];?>" title="Ready"><i class="fa fa-check " aria-hidden="true"></i></a></h5>
  </div>
</div><hr style="margin-bottom: 0px;margin-top: 0px;border-top: 1px solid #eee;">
<?php } ?>

</div>
<div class="clearfix"></div>
</form>
<?php include('footer.php'); ?>


