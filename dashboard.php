<?php 

session_start();
 if($_SESSION['worker_id']==null)
    {
        header("Location:login.php");
    }
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
		.btn{padding: 20px 20px 20px 20px; border-radius: 8px;width: 30%; height: 3%; background-color: white;color: #ff9900;border:1px solid #ff9900;font-size: 25px;display: inline-block;cursor: pointer;}
		.btn:hover{background-color: #ff9900;color: white;}
		.gren{height: 20%;width: 6%;border:none;border-radius: 8px;display: inline-block;background-color: #33cc33;text-align: center;color: white;padding: 20px 20px 20px 20px;margin: 20px 20px 20px 20px;}
		.rd{height: 20%;width: 6%;border:none;border-radius: 8px;display: inline-block;background-color: red;text-align: center;color: white;padding: 20px 20px 20px 20px;margin: 20px 20px 20px 20px;}
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
<div style="margin-top: 5%;font-family: Franklin Gothic Book;">
<?php
            $servername="localhost";
            $username="root";
            $password="";
            $dbname="Kaushalya";
         
            $conn=mysqli_connect($servername,$username,$password,$dbname);
           
            if(!$conn){
                die("connection failed:" . mysqli_connect_error());
            }

            $regID=$_SESSION['worker_id'];
             
$sql = "SELECT * FROM workers where worker_id=?";
   $stmt = $conn->stmt_init();
            $stmt->prepare($sql);
            $stmt->bind_param("i", $regID);
            $stmt->execute();
            $result = $stmt->get_result();
            $resultArray = $result->fetch_assoc();
	if($resultArray)
            {
                 echo "<div style='font-size: 19px;'><b>Name: </b>".$resultArray['Name']."</div><br>";
	echo "<div style='font-size: 19px;'><b>Age: </b>".$resultArray['Age']."</div><br>";
	echo '<br>';
                 $level = $resultArray['Level'];
	for($x=1;$x<5;$x++)
	{
		if($x<$level)
		{echo '<div class="gren">Level '.$x.' <br>Done</div>';}
		else
		{echo '<div class="rd">Level '.$x.' Pending</div>';}

	}
	
	
	if($resultArray['Level']==0){echo '<a href="level1.php"><button class="btn">Start Course</button></a>';}
	if($resultArray['Level']==1){echo '<a href="level2.php"><button class="btn">Continue Course</button></a>';}
	if($resultArray['Level']==2){echo '<a href="level3.php"><button class="btn">Continue Course</button></a>';}
	if($resultArray['Level']==3){echo '<a href="level4.php"><button class="btn">Continue Course</button></a>';}
	if($resultArray['Level']==4){echo '<a href="level5.php"><button class="btn">Continue Course</button></a>';}
            }
 else
            {
                echo "<script>swal('No data found');</script>";
            }
            
            mysqli_close($conn);
    ?>   
<br><button onclick="<?php  session_destroy()?>">Log Out</button>
</div> 
</body>
</html>

	