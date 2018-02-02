
<?php
if(isset($_POST['submit']))
{
 echo  $empid=$_POST['empid']; 
     echo  $empid=$_POST['empid']; 
     echo  $pfimg=$_POST['pfimg']; 
     echo  $gender=$_POST['gender']; 
     echo  $fname=$_POST['fname']; 
     echo  $mname=$_POST['mname']; 
     echo  $lname=$_POST['lname']; 
     echo  $bdate=$_POST['bdate']; 
     echo  $marital=$_POST['marital']; 
     echo  $mnumber=$_POST['mnumber']; 
     echo  $address1=$_POST['address1']; 
     echo  $address2=$_POST['address2']; 
     echo  $address3=$_POST['address3']; 
     echo  $country=$_POST['country']; 
    echo  $state=$_POST['state']; 
    echo  $city=$_POST['city']; 
    echo  $aadharcard=$_POST['aadharcard']; 
    echo $joindate=$_POST['joindate']; 
    echo  $leavedate=$_POST['leavedate']; 
    echo  $status=$_POST['status']; 
    echo  $role=$_POST['role']; 
    echo  $position=$_POST['position']; 
     echo  $email=$_POST['email']; 
     echo  $password=$_POST['password']; 
     echo  $Salary=$_POST['Salary']; 
    
     $con=mysql_connect("localhost","root","") ;
    mysql_select_db("hr");
    
   
    $sql="INSERT INTO `employee`( `EmployeeId`, `FirstName`, `MiddleName`, `LastName`, `Birthdate`, `Gender`, `Address1`, `Address2`, `Address3`, `CityId`, `Mobile`, `Email`, `Password`, `AadharNumber`, `MaritalStatus`, `PositionId`, `JoinDate`, `LeaveDate`, `StatusId`, `RoleId`, `ImageName`, `Salary`) VALUES ('$empid',' $fname', '$mname','$lname','$bdate','$gender','$address1','$address2','$address3', '$city','$mnumber','$email','$password','$aadharcard','$marital','$position','$joindate','$leavedate','$status','$role','$pfimg','$Salary')";
    mysql_query($sql);
   header("location:employeeadd.php");
}
?>

