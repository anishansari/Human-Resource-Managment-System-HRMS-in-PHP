<?php include('header.php');?>

<?php
mysql_connect("localhost","root","");
mysql_select_db("hr");
$s="SELECT * FROM `project` WHERE 1";
$resource=mysql_query($s);
$count=mysql_num_rows($resource);
echo "<center><h1>HRMS PROJECT DETAILS</h1></center>";

echo"<table border=1 >";
 echo   "<tr>";
  echo  "<th> Project Id</th>";
 echo   "<th> Project Name</th>";
echo    "<th> Project Manager</th>";
echo    "<th> Project Location</th>";
echo    "<th> EDIT</th>";
echo    "<th> DELETE</th>";
 echo   "</tr>";

while($row=mysql_fetch_row($resource))
{
    
    echo   "<tr>";
  echo  "<td> ".$row[0]."</td>";
 echo   "<td> ".$row[1]."</td>";
echo    "<td>".$row[2]."</td>";
    echo    "<td>".$row[3]."</td>";
    echo "<td><a href='editproject.php?id=".$row[0]."' color=red>EDIT</a></td>";
    echo "<td><a href='pdelete.php?id=".$row[0]."' color=red>DELETE</a></td>";
 echo   "</tr>";
    
}
?>
<!DOCTYPE html>
<html>
    
    <head><title>Project Info</title>
    <style>
        body{
            
            font-family: sans-serif;
            font-size: 10pt;
            background-image: url(HR/image/img.jpg);
            background-size: 
cover;
            background-attachment: fixed;
            
        }
        table
        {
            width: 80%;
            
        }
        table,th,td
        {
            border: 1px solid black;
           
            border-collapse: collapse;
            opacity: 0.95;
            margin-left: 50px;
           align-items: center;
            
        }
        th,td
        {
             padding: 10px;
            text-align: center;
            
        }
        th
        {
            background-color: #a70000;
            color: white;
        }
        tr:nth-child(even)
        {
            background-color: #e8e8e8;
        }
         tr:nth-child(odd)
        {
            background-color: #B0C4DE;
        }
        
        
        </style>
    
    </head>
   

</html>
<br>
    <?php include('footer.php');?>
   