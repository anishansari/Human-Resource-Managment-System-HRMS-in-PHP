<?php
	$result ="";
	if(isset($_GET['msg']))
	{
		$result=$_GET['msg'];
	}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>HRMS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="css/jquery-ui.css"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head> 
<body>
	<div class="main-wthree">
	<div class="container">
	<div class="sin-w3-agile">
        <span style="color:white"><h1 align=center>H.R.M.S</h1></span>
		<h2>Sign In</h2>
		<form action="controller/login.php" method="post">
			<div class="username">
				<span class="username">Username:</span>
				<input type="Email" name="name" class="name"  placeholder="Enter Email Address">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Password: <i class="fa fa-eye" aria-hidden="false" style="padding-left: 20px;" onclick="passwordeyes()"></i></span>
				<input type="password" name="password" id="Psw" class="password"  placeholder="Enter Password">

				<div class="clearfix"></div>
			</div>
			<h4 style="color: #F1C40F;"><?php echo $result; ?></h4>
			
			<div class="login-w3">
					<input type="submit" name="submit" class="login" value="Sign In">
			</div>
			<div class="clearfix"></div>
		</form>
				 <div class="back">
					<a href="index.php">Back to home</a>
				</div>
				<div class="footer">
					
				</div>
	</div>
	</div>
	</div>
	<script>
function passwordeyes() {
    var x = document.getElementById("Psw").type;
    if(x=="password")
      document.getElementById("Psw").type="text";
    else
      document.getElementById("Psw").type="password";
}
</script>
</body>
</html>

<?php
	
?>