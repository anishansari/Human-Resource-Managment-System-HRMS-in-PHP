<?php include('header.php');?>
<?php
	$result ="";
	if(isset($_GET['msg']))
	{
		$result=$_GET['msg'];
	}
?>

<ol class="breadcrumb" style="margin: 10px 0px ! important;">
    <li class="breadcrumb-item"><a href="Home.php">Home</a><i class="fa fa-angle-right"></i>Change Password</li>
</ol>
<form method="POST" action="controller/login.php">
<div class="container-fluid" style="margin-bottom: 30px;margin-top: 10px; background: white;">
    <div class="row">
    <h2 style="color: #1abc9c;">Change Password</h2><hr>
        <div class="col-md-5 control-label">
              <label class="control-label">Old Password</label>
              <div class="input-group">
                  <span class="input-group-addon">
              <i class="fa fa-pencil" aria-hidden="true"></i>
              </span>
              <input type="password" name="oldpass" title="Old Password" placeholder="Old Password" class="form-control">
              </div>
            </div>
        <div class="clearfix"> </div>
    </div>
    <div class="row">
        <div class="col-md-5 control-label">
              <label class="control-label">New Password</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-pencil" aria-hidden="true"></i>
              </span>
              <input type="password" title="New Password" name="npassword" placeholder="New Password" class="form-control">
              </div>
            </div>
        <div class="clearfix"> </div>
    </div>

    <div class="row">
        <div class="col-md-5 control-label">
            <label class="control-label">Confirm Password</label>
            <div class="input-group">             
                <span class="input-group-addon">
        	    	<i class="fa fa-pencil" aria-hidden="true"></i>
            	</span>
              	<input type="password" name="cpassword" title="Confirm Password" placeholder="Confirm Password" class="form-control" >
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <h4 style="color: #F1C40F;"><?php echo $result ?></h4>
    <div class="row">
    	<div class="col-md-3 form-group">
        	<button type="submit" name="save" title="Save" class="btn btn-primary">Save</button>
            <button type="reset" class="btn btn-default" title="Reset">Reset</button>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

</form>

<?php include('footer.php'); ?>
