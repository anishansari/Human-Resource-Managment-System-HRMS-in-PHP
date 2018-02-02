
<?php include('header.php'); ?>






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
}

.login-block input#username {
    background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#username:focus {
    background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input#password {
    background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#password:focus {
    background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px bottom no-repeat;
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

<div class="logo"></div>
<div class="login-block">
    <form name="f1" action="Designation.php" method="post">
    <h1>Designation</h1>
   <p> Emplyee ID:<input type="text" name="eid" placeholder=" eg:-123" value=""> </p>
     <p>  Designation:<input type="text" name="ename" placeholder=" eg:Engineer" value=""> </p>
    
    
   <button type="submit" name="sub">Submit</button>
    <br>
    <br>
    
   <button type="reset" name="reset">Reset</button>
        </form>
</div>

</body>
</html>
<?php

if(isset($_POST['sub'])){
    
   $id= $_POST['eid'];
   $name= $_POST['ename'];
    $con=mysql_connect("localhost","root","") ;
    mysql_select_db("hr");
    
   
    $sql="INSERT INTO `designation`(`emp_id`, `name`) VALUES  ('$id','$name')";
    mysql_query($sql);
    
    
}

?>
<?php include('footer.php'); ?>
