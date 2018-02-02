<?php include('userheader.php'); ?>
<?php
	$result="";
	if(isset($_GET['msg']))
	{
		$result=$_GET['msg'];
	}
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];	
	}
?>
    <div class="s-12 l-10">
    <h1>Change Password</h1><hr>
    <div class="clearfix"></div>
    </div>
    <div class="s-12 l-6">
      	<form action="../controller/login.php" method="post">
		    <label for="fname">Old</label>
		    <input type="Password" id="fname" title="Old Password" name="oldpass" placeholder="Enter Old Password" >
		    <label for="lname">New</label>
		    <input type="Password" title="New Password" id="email" name="npassword" placeholder="Enter New Password" >
		    <label for="message">Retry</label>
		    <input type="Password" id="message" name="cpassword" title="Retry Password" placeholder="Enter Retry Password">
		    <?php if($result) { ?>
		    <h5 style="color: #E73D3D;"><?php echo (isset($result))?$result:""; } else { ?></h5>
		    <h5 style="color: #127409;"><?php echo (isset($id))?$id:""; } ?></h5>

		    <input type="submit" title="Submit" name="usave" value="Submit">
	  	</form>
               </div>
<?php include('userfooter.php'); ?>