<?php include('header.php');?>
<?php

	include_once('controller/connect.php');
  
  	$dbs = new database();
  	$db=$dbs->connection();
  	$SelectedSortById = "";
  	$m="";
  	$daty="";
  	if (isset($_POST['yearss']))
  	{
  		//print_r($_POST['yearss']);exit;
  		$by = $_POST['by'];
  		if($by == 3)
  		{
	  		$by = $_POST['by'];
	  		$SelectedSortById = $by;
	  		$daty = $_POST['years'];
	  		$viewatten = mysqli_query($db,"SELECT *,COUNT(EmpId) as TotalDays,sum(DailyWorkingminutes) as TotalMinute,(SELECT Concat(FirstName,' ',MiddleName,' ',LastName) from employee where EmployeeId=d.EmpId) as FullName,SUBSTR(LoginDate,1,7) FROM dailyworkload d where SUBSTR(d.LoginDate,1,4)='$daty' group by EmpId");
  		}
  		else if($by == 2)
  		{
  			$by = $_POST['by'];
	  		$SelectedSortById = $by;
	  		$daty = $_POST['years'];
	  		$m = $_POST['months'];
	  		$da = $daty."-".$m;

	  		$viewatten=mysqli_query($db,"SELECT *,COUNT(EmpId) as TotalDays,sum(DailyWorkingminutes) as TotalMinute,(SELECT Concat(FirstName,' ',MiddleName,' ',LastName) from employee where EmployeeId=d.EmpId) as FullName,SUBSTR(LoginDate,1,4) FROM dailyworkload d where SUBSTR(d.LoginDate,1,7)='$da' group by EmpId");
  		}
  		else
  		{
  			$viewatten = mysqli_query($db,"SELECT *,COUNT(EmpId) as TotalDays,sum(DailyWorkingminutes) as TotalMinute,(SELECT Concat(FirstName,' ',MiddleName,' ',LastName) from employee where EmployeeId=d.EmpId) as FullName FROM `dailyworkload` d group by EmpId");
  		}

  	}
  	/*else if (isset($_GET['id'])) 
  	{
  		$searchname = $_POST['search'];
  		$by = $_POST['by'];
	  	$SelectedSortById = $by;
	  	print_r($SelectedSortById);exit;
	  	if($SelectedSortById == 2)
	  	{
	  		
	  	}
  	}*/
  	else 
  	{
  		
  		$viewatten = mysqli_query($db,"SELECT *,COUNT(EmpId) as TotalDays,sum(DailyWorkingminutes) as TotalMinute,(SELECT Concat(FirstName,' ',MiddleName,' ',LastName) from employee where EmployeeId=d.EmpId) as FullName FROM `dailyworkload` d group by EmpId");
  	}
?>
<ol class="breadcrumb" style="margin: 10px 0px ! important;">
    <li class="breadcrumb-item"><a href="Home.php">Home</a><i class="fa fa-angle-right"></i>Leave<i class="fa fa-angle-right"></i>Attendece View</li>
</ol>
<form method="post">
<div class="validation-form" style="margin-bottom: 30px;">
	<h2 style="color: #1abc9c;">Attendece View</h2>
	<div class="row" style="margin-bottom: 10px;">
		<div class="col-md-2">
			<select id="sortby" name="by" style="text-transform: capitalize;" onchange="sortbychange();" onclick="sortbychange();">
				<option value="1" <?php if($SelectedSortById==1){echo "selected";} ?>>By All</option>
				<option value="2" <?php if($SelectedSortById==2){echo "selected";} ?>>By Month</option>
				<option value="3" <?php if($SelectedSortById==3){echo "selected";} ?>>By Year</option>
			</select>
		</div>
		<div class="col-md-2">
			<select id="year" name="years" style="text-transform: capitalize; display: none;" required="">
				<option value="">-- Select Year --</option>
				<?php 
				$datey = date("Y"); 
				$d = 2015;
				while($d <= $datey) {?>
				<option value="<?php echo $d;?>" <?php if($daty==$d){ echo "selected";}?>><?php echo $d ;?></option>
				<?php $d++; }?>
			</select>
		</div>

		
		<div class="col-md-2">
			<select id="month" name="months" style="text-transform: capitalize; display: none;" >
				<option value="">-- Select Month --</option>
				<option value="01" <?php if($m==1){ echo "selected";}?>>01</option>
				<option value="02" <?php if($m==2){ echo "selected";}?>>02</option>
				<option value="03" <?php if($m==3){ echo "selected";}?>>03</option>
				<option value="04" <?php if($m==4){ echo "selected";}?>>04</option>
				<option value="05" <?php if($m==5){ echo "selected";}?>>05</option>
				<option value="06" <?php if($m==6){ echo "selected";}?>>06</option>
				<option value="07" <?php if($m==7){ echo "selected";}?>>07</option>
				<option value="08" <?php if($m==8){ echo "selected";}?>>08</option>
				<option value="09" <?php if($m==9){ echo "selected";}?>>09</option>
				<option value="10" <?php if($m==10){ echo "selected";}?>>10</option>
				<option value="11" <?php if($m==11){ echo "selected";}?>>11</option>
				<option value="12" <?php if($m==12){ echo "selected";}?>>12</option>
			</select>
		</div>
		<div class="col-md-1">
			<button type="submit" style="display: none;" id="add" name="yearss" class="btn btn-primary">Submit</button>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-1"></div>
		<div class="col-md-2">
			<input placeholder="Search" value="<?php echo(isset($SearchName))?$SearchName:''; ?>" type="search-box" name="search" style="padding-right: 40px;">
		</div>
		<div class="col-md-1">
			<a href="atten.php?id=search"><i class="fa fa-search" style="padding-top: 5px;" aria-hidden="true"></i></a>
		</div>
	</div>
	<div class="row" style="color: white; margin-right: 0; margin-left:0;">
		<div class="col-md-1" style="background-color: red;">
			<label>ID</label>
		</div>
		<div class="col-md-5" style="background-color: red;">
			<label>Name</label>
		</div>
		<div class="col-md-2" style="background-color: red;">
			<label>Employee ID</label>
		</div>
		<div class="col-md-2" style="background-color: red;">
			<label>Day</label>
		</div>
		<div class="col-md-2" style="background-color: red;">
			<label>Hours</label>
		</div>
	</div>
	<?php $i=1; while($row = mysqli_fetch_assoc($viewatten)) { //print_r($row['FullName']);exit();
		$day =$row['TotalDays'];
		$hours =$row['TotalMinute']/60;  $h = str_replace('.',':',round($hours,2));?>
	<div class="row" style="margin-right: 0; margin-left: 0;">
		<div class="col-md-1">
			<label><?php $i=$i; echo $i; $i++;?></label>
		</div>
		<div class="col-md-5">
			<label><?php echo(isset($row['FullName']))?$row['FullName']:"";?></label>
		</div>
		<div class="col-md-2">
			<label><?php echo(isset($row['EmpId']))?$row['EmpId']:"";?></label>
		</div>
		<div class="col-md-2">
			<label><?php echo(isset($day))?$day:"";?></label>
		</div>
		<div class="col-md-2">
			<label><?php echo(isset($h))?$h:"";?></label>
		</div>
	</div><hr style="margin-bottom: 10px;margin-top: 5px;border-top: 1px solid #eee;">
	<?php } ?>
</div>
</form>
<?php include('footer.php'); ?>
<script type="text/javascript">
    sortbychange();
	function sortbychange()
	{
		var selectedval = $("#sortby").val();
		if(selectedval==1)
		{
			$("#year").css("display","none");
			$("#month").css("display","none");
			$("#add").css("display","none");
			$viewatten = mysqli_query($db,"SELECT *,COUNT(EmpId) as TotalDays,sum(DailyWorkingminutes) as TotalMinute,(SELECT Concat(FirstName,' ',MiddleName,' ',LastName) from employee where EmployeeId=d.EmpId) as FullName FROM `dailyworkload` d group by EmpId");
		}
		if(selectedval==2)
		{
			$("#year").css("display","block");
			$("#month").css("display","block");
			$("#add").css("display","block");
		}
		if(selectedval==3)
		{
			$("#year").css("display","block");
			$("#month").css("display","none");
			$("#add").css("display","block");
		}	
	}
</script>