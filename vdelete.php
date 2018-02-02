<?php
$con=mysql_connect("localhost","root","") ;
    mysql_select_db("hr");

$s="DELETE FROM `vacancy` where vid=".$_GET["id"];
mysql_query($s);
header("location:viewvacancy.php");
?>