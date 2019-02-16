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
<link rel="stylesheet" href="css/bootstrap.min.css">
    <scipt src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert.min.js"></script> 
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
<center><div style="margin-top: 15%;">
    <form action="<?php $_SERVER['PHP_SELF'];?>" METHOD ="POST">
       
            <input type="text" name="Name" id="Name" placeholder="Name" required><br><br>

            <input type="password" name="Password" id="Password" placeholder="Password" required><br>
     
            <input type="submit" value="login">
      
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $servername="localhost";
            $username="root";
            $password="";
            $dbname="kaushalya";
          
            $conn=mysqli_connect($servername,$username,$password,$dbname);
           
            if(!$conn){
                die("connection failed:" . mysqli_connect_error());
            }

            $name=$_POST['Name'];
            $password=$_POST['Password'];
            
            $sql = "SELECT * FROM workers where Name=? and Password=?";
            
            $stmt = $conn->stmt_init();
            $stmt->prepare($sql);
            $stmt->bind_param("ss", $name,$password);
            $stmt->execute();
            $result = $stmt->get_result();
           $resultArray = $result->fetch_assoc();
            if($resultArray)
            {   
                $_SESSION['worker_id'] = $resultArray['worker_id'];
             
	header("Location:dashboard.php");
            }
            else
            {
                echo "Invalid Login credentials.";
            }
            
            mysqli_close($conn);

        }
    ?>
</div>
</body>
</html>