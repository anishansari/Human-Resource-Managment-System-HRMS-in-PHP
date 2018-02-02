<?php
if(isset($_POST['sub']))
{
$con=mysql_connect("localhost","root","") ;
    mysql_select_db("hr");
echo  $vid= $_POST['vid1'];
  echo  $vname= $_POST['vname'];
   echo $vidate= $_POST['vidate'];
  echo  $vedate= $_POST['vedate'];
  echo   $vpreq= $_POST['vpreq'];
 echo   $vdreq= $_POST['vdreq'];
$s="update vacancy set name='".$vname."',isdate='".$vidate."',exdate='".$vedate."',post='".$vpreq."',degree='".$vdreq."' where vid=".$vid;
mysql_query($s);
header("location:viewvacancy.php");
    }
?>