<?php
	include_once('connect.php');
	$dbs = new database();
	$db=$dbs->connection();
	session_start();
	if(isset($_POST['submit']))
	{
		$data=$_POST;
		$editid = 0;
		if(isset($_GET['empedit'])){ 
			$editid = $_GET['empedit'];
		};
		$empid=$data['empid'];
		$img=$_FILES['pfimg']['name'];
		$gender=$data['gender'];
		$fname=$data['fname'];
		$mname=$data['mname'];
		$lname=$data['lname'];
		$bdate=$data['bdate'];
		$mnumber=$data['mnumber'];
		$email=$data['email'];
		$address1=$data['address1'];
		$address2=$data['address2'];
		$address3=$data['address3'];
		$city=$data['city'];
		$aadharcard=$data['aadharcard'];
		$joindate=$data['joindate'];
		$leavedate=$data['leavedate'];
		$status=$data['status'];
		$role=$data['role'];
		$Salary=$data['Salary'];
		$password=$data['password'];
		$marital=$data['marital'];
		$position=$data['position'];
		$imagefilename = $data['imagefilename'];
		$ImageComplete=false;

		if($editid==0){
			$sql = mysqli_query($db,"select * from employee where Email='$email'");
		}
		else{
			$sql = mysqli_query($db,"select * from employee where Email='$email' and empid!=$editid");
		}
		
		if(mysqli_num_rows($sql) > 0)
		{
			header("location:../employeeadd.php?msg=Email address all ready existed!");exit;
		}
		else
		{
			if(!empty($_FILES['pfimg']['name']))
			{
				$name=$_FILES['pfimg']['name'];
				$temp=$_FILES['pfimg']['tmp_name'];
				$size=$_FILES['pfimg']['size'];
				$type=$_FILES['pfimg']['type'];
						
				if($type != "image/jpg" && $type != "image/png" && $type != "image/jpeg" && $type != "image/gif")
				{
					header("location:../employeeadd.php?msg=Invalid image !");exit;
				}
				else
				{
					if($size > 1000000)
					{
						header("location:../employeeadd.php?msg=File size upto 1MB required ! ");exit;
					}
					else
					{	
						$ImageComplete=true;
					}				
				}
			}
			else
			{
				$in = $_POST["imagefilename"];
				
				if(file_exists("../image/".$in))
				{
					$ImageComplete=true;
				}
				else
				{
					header("location:../employeeadd.php?msg=Pleaes Select Profile Image! ");exit;	
				}
			}	
		}

		if($ImageComplete)
		{
			$roleid = $_SESSION['User']['RoleId'];
			date_default_timezone_set("Asia/Kolkata");
			$datetime = date("Y-m-d h:i:s");

			if($editid==0)
			{
				if(!empty($_FILES['pfimg']['name']))
				{
					$name = rand(222,333333).$name;
					move_uploaded_file($temp,"../image/".$name);
				}
				else
				{
					$name = $_POST["imagefilename"];
				}
				mysqli_query($db,"insert into employee values(null,'$empid','$fname','$mname','$lname','$bdate','$gender','$address1','$address2','$address3','$city','$mnumber','$email','$password','$aadharcard','$marital','$position','$roleid','$datetime',null,null,'$joindate','$leavedate',null,null,'$status','$role','$name','$Salary')");

				header("location:../employeeadd.php?id=Successfull... ");exit;
			}
			else
			{
				if(!empty($_FILES['pfimg']['name']))
				{
					$name = rand(222,333333).$name;
					move_uploaded_file($temp,"../image/".$name);
				}
				else
				{
					$name = $_POST["imagefilename"];
				}
				mysqli_query($db,"update employee set EmployeeId='$empid',FirstName='$fname',MiddleName='$mname',LastName='$lname',Birthdate='$bdate',Gender='$gender',Address1='$address1',Address2='$address2',Address3='$address3',CityId='$city',Mobile='$mnumber',Email='$email',Password='$password',AadharNumber='$aadharcard',MaritalStatus='$marital',PositionId='$position',ModifiedBy='$roleid',ModifiedDate='$datetime',JoinDate='$joindate',LeaveDate='$leavedate',StatusId='$status',RoleId='$role',ImageName='$name',MacAddress='$Salary' where EmpId='$editid' ");

				header("location:../detailview.php?employeeid=$editid");exit;
			}
			/*"(EmpId,EmployeeId,FirstName,MiddleName,LastName,Birthdate,Gender,Address1,Address2,Address3,CityId,Mobile,Email,Password,AadharNumber,MaritalStatus,PositionId,CreatedBy,CreatedDate,ModifiedBy,ModifiedDate,JoinDate,LeaveDate,LastLogin,LastLogout,StatusId,RoleId,ImageName,MacAddress)";*/
		}
	}
?>