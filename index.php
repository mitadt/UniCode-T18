<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Kaushalya - platform to develop skills</title>
	<style>
		.nav{height: 5%;backgroud-color: white;padding: 10px 10px 20px 10px;float: right;margin-right: 2%;font-family: Franklin Gothic Book;}	
		.nav a{color: black;text-decoration: none;padding: 15px 25px;font-size: 19px;}
		.nav a:hover{color: #5c5c3d;}
		.nav a.active{color: #5c5c3d;}
		.btn{padding: 20px 20px 20px 20px; border-radius: 8px;width: 30%; height: 3%; background-color: white;color: #ff9900;border:1px solid #ff9900;font-size: 25px;display: inline-block;cursor: pointer;margin: 20px 20px 20px 20px;}
		.btn:hover{background-color: #ff9900;color: white;}
	</style>
</head>
<body>
	<div style="font-size: 50px;font-family: Perpetua Titling MT;float: left;">KAUSHALYA</div>
	<div class="nav">
		<a class="active" href="index.php">Home</a>
		<a href=".php">About</a>
		<a href=".php">Contact Us</a>
		<a href="dashboard.php">Dashboard</a>
	</div>
 <img src="skills-header-no-text.jpg" height=380px width=100% style="margin-top: 0.8%;opacity: 0.8;">
   	
<div style="margin-top: 3%;text-align:center;">
	<a href="login.php"><button class="btn">Login</button></a>
	<a href="registration.php"><button class="btn">Register</button></a>
    
</div>
</body>
</html>
