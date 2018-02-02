





<?php
mysql_connect("localhost","root","");
mysql_select_db("hr");
$s="select * from project where pid=".$_GET["id"];
$result=mysql_query($s);
$row=mysql_fetch_assoc($result);
$count=mysql_num_rows($result);


?>

<?php
if(isset($POST['sub'])){
     $id= $_POST['eid'];
    $name= $_POST['ename'];
    $mgr= $_POST['emgr'];
    $loc= $_POST['eloc'];
   
}
?>
<?php
if(isset($POST['sclose'])){
    header("location:viewproject.php");
}
?>
<!Doctype html>
<html>
    <head>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<meta charset="UTF-8">
        
        <style>
body {
    background: url('../image/IMG_20170204_135243.jpg') no-repeat fixed center center;
    background-size: cover;
    font-family: Montserrat;
}

.logo {
    width: 213px;
    height: 36px;
    background: url(' ') no-repeat;
    margin: 30px auto;
}

.login-block {
    width: 320px;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
   
    margin: 0 auto;
}

.login-block h1 {
    text-align: center;
    color: #000;
    font-size: 18px;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 20px;
}

.login-block input {
    width: 100%;
    height: 42px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    font-size: 14px;
    font-family: Montserrat;
    padding: 0 20px 0 50px;
    outline: none;
    color: #e15960;
    
}

.login-block input#pid {
    background: #e15960 url('http://i.imgur.com/u0XmBmv.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#pid:focus {
    background: #e15960 url('http://i.imgur.com/u0XmBmv.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input#password {
    background: #e15960 url('http://i.imgur.com/Qf83FTt.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#password:focus {
    background: #e15960 url('http://i.imgur.com/Qf83FTt.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input:active, .login-block input:focus {
    border: 1px solid #ff656c;
}

.login-block button {
    width: 100%;
    height: 40px;
    background: #008000;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #e15960;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    font-family: Montserrat;
    outline: none;
    cursor: pointer;
}

.login-block button:hover {
    background: #ff7b81;
}

</style>
    
    
    </head>
    <body>
    
<div class="login-block">
<form method="post" action="pupdate.php">
    <h1>Project Updation</h1>
    <input type="hidden" name="pid1" value="<?php echo $row['pid'];?>"><br>
    Project   Id :<br><input type="text" name="pid" value="<?php echo $row['pid'];?>"><br>
    Project Name :<br><input type="text" name="pname" value="<?php echo $row['pname'];?>"><br>
    Project Manager :<br><input type="text" name="pmgr" value="<?php echo $row['pmgr'];?>"><br>
    Project Location :<br><input type="text" name="ploc" value="<?php echo $row['plocation'];?>"><br>
    <input type="submit" name="sub" value="UPDATE">
    
   <a href="viewproject.php"> <input type="button" name="sclose" value="CLOSE" onclick=" navigate(viewproject.php)"></a>
    
</form>
</div>
    </body>
    </html>


   
