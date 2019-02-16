<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kaushalya - platform to develop skills	</title>
    <style>
	.nav{height: 5%;backgroud-color: white;padding: 10px 10px 20px 10px;float: right;margin-right: 2%;font-family: Franklin Gothic Book;}	
	.nav a{color: black;text-decoration: none;padding: 15px 25px;font-size: 19px;}
	.nav a:hover{color: #5c5c3d;}
	.nav a.active{color: #5c5c3d;}
	.btn{padding: 20px 20px 20px 20px; border-radius: 8px;width: 30%; height: 3%; background-color: white;color: #ff9900;border:1px solid #ff9900;font-size: 25px;display: inline-block;cursor: pointer;margin: 20px 20px 20px 20px;}
	.btn:hover{background-color: #ff9900;color: white;}
	input[type=submit]{padding: 20px 20px 20px 20px; border-radius: 8px;width: 20%; height: 3%; background-color: white;color: #ff9900;border:1px solid #ff9900;font-size: 25px;display: inline-block;cursor: pointer;margin: 20px 20px 20px 20px;}
	input[type=submit]:hover{background-color: #ff9900;color: white;}
	input[type=text], input[type=password]{  width: 20%;  padding: 12px 20px;  margin: 8px 0;  box-sizing: border-box;}
    </style>
</head>

<body>

<div style="font-size: 50px;font-family: Perpetua Titling MT;float: left;">KAUSHALYA</div>
	<div class="nav">
		<a class="active" href="index.php">Home</a>
		<a href="index.php">About</a>
		<a href="index.php">Contact Us</a>
	</div>
<br><br>
<center><div style="margin-top: 10%;">

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
         
<input type="text" name="name" id="name" placeholder="Name"><br>
<input type="password" name="password" id="password" placeholder="Password"><br>
<input type="text" name="age" id="age" placeholder="Age">      <br>
<input type="text" name="phone" id="phone" placeholder="Phone No.">      <br>
                      
<input type="submit" value="register">                
                        
</form>

</div>
    
   
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
  {

  $servername="localhost";
    $username="root";
    $password="";
    $dbname="Kaushalya";

    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn)
    {
        die("connection failed".mysqli_connect_error());

    }
   
$name = $_POST['name'];
$password = $_POST['password'];
 $age = $_POST['age'];
 $phone = $_POST['phone'];


    $sql="INSERT INTO workers(Name,Password,Age,Phone_no)
          VALUES ('$name','$password','$age','$phone')";
     
    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('registration successful');</script>";
    }
    else
    {
        echo "Error :".mysqli_error($conn);
    }


   mysqli_close($conn);
}
   ?>
   </div>
   </div>
</body>

</html>