<?php


$conn = mysql_connect("localhost","root","");

mysql_select_db("hr",$conn);
$query = "Select u.Empid,u.Salary from employee u";
$results =  mysql_query($query);
while($row = mysql_fetch_array($results)){
    echo $row['Empid'];
echo $row['Salary'];
}
?>