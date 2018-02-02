<?php include('header.php');?>
<?php
  include_once('controller/connect.php');
  
  $dbs = new database();
  $db=$dbs->connection();
  $sql = mysqli_query($db,"SELECT * FROM employee where RoleId !=1");
	if(isset($_POST['modifiedlogout']))
  	{
  		$leavestatus = $_POST['leavestatus'];
  		$enddate = $_POST['enddate'];
  		$endd =date("Y/m/d" ,strtotime($enddate));
  		$logindate = mysqli_query($db,"select * from dailyworkload where EmpId='$leavestatus' and cast(LoginDate as date)='$endd'");
  		$logindateselect = mysqli_fetch_assoc($logindate);
  		$login1 = $logindateselect['LoginDate'];

  		$date1 = date($login1);
		$date2 = date($enddate);
		$hours = ((strtotime($date2) - strtotime($date1))/60);

  		mysqli_query($db,"update dailyworkload set LogoutDate='$enddate',DailyWorkingminutes='$hours' where cast(LoginDate as date)='$endd' and EmpId='$leavestatus'");
  		echo "<script>window.location='modifiedlogout.php';</script>";
  	}
?>
<ol class="breadcrumb" style="margin: 10px 0px ! important;">
    <li class="breadcrumb-item"><a href="Home.php">Home</a><i class="fa fa-angle-right"></i>Employee<i class="fa fa-angle-right"></i> Modified Logout Time</li>
</ol>
<form method="POST">
<div class="container-fluid" style="margin-bottom: 30px;margin-top: 10px; background: white;">
  <div class="row" style="margin-left: 0; margin-right: 0;">
    <h2 style="color: #1abc9c;">Modified Logout Time</h2><hr>
    <div class="col-md-5 control-label">
        <label class="control-label">Employee ID</label>
        <div class="input-group">             
            <span class="input-group-addon">
            <i class="fa fa-sun-o" aria-hidden="true"></i>
            </span>
            <select name="leavestatus" title="Select Leave" style="text-transform: capitalize; " required>
            <option value="">-- Select Employee ID --</option>
            <?php while($row = mysqli_fetch_assoc($sql)) { ?>
            <option value="<?php echo $row['EmployeeId']; ?>"><?php echo $row['EmployeeId'];?></option>
            <?php } ?>
            </select>
        </div>
        </div>
        <div class="clearfix"> </div>
    </div>

    <div class="row" style="margin-left: 0; margin-right: 0;">
        <div class="col-md-5 control-label">
            <label class="control-label">Logout Date</label>
            <div class="input-group">             
                <span class="input-group-addon">
                <i class="fa fa-calendar" aria-hidden="true"></i>
              </span>
                <input type="text" id="EndDate" autocomplete="off" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="enddate" title="Select End Date" class="form-control" required="">
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>  
    <div class="row" style="margin-left: 0; margin-right: 0;">
      <div class="col-md-3 form-group">
          <button type="submit" name="modifiedlogout" title="Add" class="btn btn-primary">Add</button>
            <button type="reset" class="btn btn-default" title="Reset">Reset</button>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
</form>
<?php include('footer.php'); ?>
<script type="text/javascript">
 
$('#EndDate').datetimepicker({
dayOfWeekStart : 1,
//lang:'en',
timepicker:true,
//disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:  $("#EndDate").val()
});
$('#EndDate').datetimepicker({value:$("#EndDate").val(),step:10});

</script>