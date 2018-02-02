<?php
$con=mysql_connect("localhost","root","") ;
    mysql_select_db("hr");

$s="DELETE FROM `project` where pid=".$_GET["id"];
mysql_query($s);
header("location:viewproject.php");
?>