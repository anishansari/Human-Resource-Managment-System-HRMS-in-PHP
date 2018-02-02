<?php include('header.php'); ?>
<?php
	include_once('controller/connect.php');
	$dbs = new database();
	$db=$dbs->connection();
	$row = "";
	$gendern ="";
	$maritaln ="";
	$cityn ="";
	$staten ="";
	$countryn ="";
	$positionn = "";
	$rolen ="";
	$ProfileEmpId=$_SESSION['User']['EmployeeId'];
	$view = mysqli_query($db,"select * from employee where EmployeeId='$ProfileEmpId'");
	$row = mysqli_fetch_assoc($view);
		
	$genderid = $row['Gender'];
	$gid = mysqli_query($db,"select * from gender where GenderId='$genderid'");
	$gendern = mysqli_fetch_assoc($gid);

	$maritalid = $row['MaritalStatus'];
	$mid = mysqli_query($db,"select * from maritalstatus where MaritalId='$maritalid'");
	$maritaln = mysqli_fetch_assoc($mid);

	$cityid = $row['CityId'];
	$cid = mysqli_query($db,"select * from city where CityId='$cityid'");
	$cityn = mysqli_fetch_assoc($cid);

	$stateid = $cityn['StateId'];
	$sid = mysqli_query($db,"select * from state where StateId='$stateid'");
	$staten = mysqli_fetch_assoc($sid);

	$countryid = $staten['CountryId'];
	$couid = mysqli_query($db,"select * from country where CountryId='$countryid'");
	$countryn = mysqli_fetch_assoc($couid);

	$positionid = $row['PositionId'];
	$pid = mysqli_query($db,"select * from position where PositinId='$positionid'");
	$positionn = mysqli_fetch_assoc($pid);

	$roleid = $row['RoleId'];
	$rid= mysqli_query($db,"select * from role where RoleId='$roleid'");
	$rolen = mysqli_fetch_assoc($rid);
	
	if(isset($_POST['close']))
	{
		echo "<script>window.location='home.php';</script>";
	}
?>
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<ol class="breadcrumb" style="margin: 10px 0px ! important;">
    <li class="breadcrumb-item"><a href="Home.php">Home</a><i class="fa fa-angle-right"></i>Profile</li>
</ol>
<form method="post">
<div class="validation-form" style="margin-top: 0;">
	<h2 style="text-transform: capitalize; margin: 0px;"><?php if($row) { echo $row['FirstName']."&nbsp;".$row['MiddleName']."&nbsp".$row['LastName'];} else { echo "Null"; } ?> -&nbsp;&nbsp;<font color="black"><?php if($row>0) { echo "Employee ID ::&nbsp;".$row['EmployeeId']; } else { echo "<b>Employee ID</b> ::&nbsp; Null"; }?></font></h2>
	<div class="row">
		<div class="col-md-5">
			<table>
				<tbody>
					<tr>
						<td rowspan="2" style="text-align: right;"><b>Photo</b>&nbsp; ::</td>
						<td rowspan="2"><img src="image/<?php if($row) { echo $row['ImageName']; } else{ echo "Null"; }?>" style=" height: 61px; border: double;"></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Address</b> &nbsp;::</td>
						<td><?php if($row) { echo $row['Address1']; } else{ echo "Null"; }?>,</td>
					</tr>
					<tr>
						<td></td>
						<td><?php if($row) { echo $row['Address2']; } else{ echo "Null"; }?>,&nbsp;&nbsp;<?php if($row) { echo $row['Address3']; } else{ echo "Null"; }?></td>
						
					</tr>
					<tr>
						<td></td>
						<td><?php if($cityn) { echo ucfirst($cityn['Name']); } else{ echo "Null"; }?> ,&nbsp;&nbsp;&nbsp;<?php if($staten) { echo ucfirst($staten['Name']); } else{ echo "Null"; }?> ,&nbsp;&nbsp;&nbsp;<?php if($countryn) { echo ucfirst($countryn['Name']); } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-4">
			<table>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Gender</b> ::</td>
						<td><?php if($gendern) { echo ucfirst($gendern['Name']); } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Marital</b> ::</td>
						<td><?php if($maritaln) { echo $maritaln['Name']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Birth Date</b> ::</td>
						<td><?php if($row) { echo $row['Birthdate']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Email</b> ::</td>
						<td><?php if($row) { echo $row['Email']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Mobile</b> ::</td>
						<td><?php if($row) { echo $row['Mobile']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div class="col-md-3">
			<table>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Role</b> ::</td>
						<td><?php if($rolen) { echo ucfirst($rolen['Name']); } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Position</b> ::</td>
						<td><?php if($positionn) { echo $positionn['Name']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Join Date</b> ::</td>
						<td><?php if($row) { echo $row['JoinDate']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Salary</b> ::</td>
						<td><?php if($row) { echo $row['Salary']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row" style="text-align: center; margin-top: 2%;">
		<div class="col-md-12 form-group">
            <button type="submit" name="close" class="btn btn-primary">Close</button>
        </div>
	</div>
</div>
</form>
<?php include('footer.php'); ?>