<?php
	session_start();
	include_once('connect.php');
	
	$dbs = new database();
	$db=$dbs->connection();
	$emp = $_SESSION['User']['EmployeeId'];
	
	if($emp==1)
	{
		unset($_SESSION['User']);
		session_destroy();
		header('location:../index.php');exit;
	}
	else
	{
		$email = $_SESSION['User']['Email'];
		date_default_timezone_set("Asia/Kolkata");
		$datetime = date("Y-m-d H:i:s");
		$date = date("Y-m-d");
		$empid = $_SESSION['User']['EmployeeId'];
		mysqli_query($db,"update employee set LastLogout='$datetime' where Email='$email' ");
		
		$datetimeid = $_SESSION['dailyid'];
		$logindateid = mysqli_query($db,"select * from dailyworkload where DailyWorkLoadId='$datetimeid'");	
		$LoginDate = mysqli_fetch_assoc($logindateid);
		$logind = $LoginDate['LoginDate'];

		/*hours count*/
		$date1 = date($logind);
		$date2 = date($datetime);
		$hours = ((strtotime($date2) - strtotime($date1))/60);
		/*end */ 

		//print_r($hours);exit;

		/*Day count*/
		$date11=date_create($date1);
		$date22=date_create($date2);
		$diff=date_diff($date11,$date22);
		$n = $diff->format("%a");
		/*end */

		mysqli_query($db,"update dailyworkload set LogoutDate='$datetime',DailyWorkingminutes='$hours' where EmpId='$empid' and cast(LoginDate as date) = '$date'");
		unset($_SESSION['User']);
		session_destroy();
		header('location:../user/index.php');exit;
	}
?>