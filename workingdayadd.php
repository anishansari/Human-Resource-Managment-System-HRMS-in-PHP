<?php include('header.php');?>
<?php

  include_once('controller/connect.php');
  
  $dbs = new database();
  $db=$dbs->connection();

  if(isset($_POST['submit']))
  {
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    mysqli_query($db,"insert into values(null,'$year','$month','$day')");
    echo "<script>window.location='workingdayadd.php';</script>";
  }
  
?>
<ol class="breadcrumb" style="margin: 10px 0px ! important;">
    <li class="breadcrumb-item"><a href="Home.php">Home</a><i class="fa fa-angle-right"></i>Leave<i class="fa fa-angle-right"></i>Add Working Day</li>
</ol>
<form method="POST">
<div class="container-fluid" style="margin-bottom: 30px;margin-top: 10px; background: white; ">
	<div class="row">
		<h2 style="color: #1abc9c;">Add Working Day</h2><hr>
		<div class="col-md-3 control-label">
           	<label class="control-label">Working Year</label>
           	<div class="input-group">             
               	<span class="input-group-addon">
           			<i class="fa fa-sun-o" aria-hidden="true"></i>
           		</span>
            	<input type="text" name="year" title="Year" autocomplete="off" maxlength="4" placeholder="Enter Year" value="" required="" class="form-control" style="width: 250px; height: 36px;" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
           	</div>
    </div>
  </div>
  <div class="clearfix"> </div>
  <div class="row">
    <div class="col-md-3 control-label">
            <label class="control-label">Working Month</label>
            <div class="input-group">             
                <span class="input-group-addon">
                <i class="fa fa-sun-o" aria-hidden="true"></i>
              </span>
              <input type="text" name="month" title="Month" autocomplete="off" maxlength="2" placeholder="Enter Month" value="" required="" class="form-control" style="width: 250px; height: 36px;" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">

            </div>
    </div>
  </div>
  <div class="clearfix"> </div>
  <div class="row">
        <div class="col-md-3 control-label">
            <label class="control-label">Working Monthly Day</label>
            <div class="input-group">             
                <span class="input-group-addon">
                <i class="fa fa-sun-o" aria-hidden="true"></i>
              </span>
              <input type="text" name="day" title="Day" autocomplete="off" maxlength="2" placeholder="Enter Day" value="" required="" class="form-control" style="width: 250px; height: 35px;" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">

            </div>
        </div>
  </div>
        <div class="clearfix"> </div>
  <div class="row">
        <div class="col-md-3 form-group">
        	<button type="submit" name="submit" class="btn btn-primary" title="Add">Add</button>
            <button type="reset" class="btn btn-default" title="Reset">Reset </button>
        </div>
        <div class="clearfix"> </div>
	</div>	
</div>
</form>

<?php include('footer.php'); ?>

