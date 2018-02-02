<?php
	$result ="";
	if(isset($_GET['msg'])) 
	{
		$result=$_GET['msg'];
	}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>:: HR ::</title>
  <link rel="stylesheet" href="css/st.css">
</head>

<body>
  <div class="wrapper">
	<div class="container">
		<h1>Welcome</h1>
		
		<form class="form" method="POST" Action="controller/login.php">
			<input type="text" name="name" placeholder="Email Address">
			<input type="password" name="password" placeholder="Password">
			<h3 style="color: #FF0000;"><?php echo $result; ?></h3>
			<button type="submit" name="clientlogin" id="login-button">Login</button>
		</form>
	</div>
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>