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
		.btn{padding: 20px 20px 20px 20px; border-radius: 8px;width: 25%; height: 3%; background-color: white;color: #ff9900;border:1px solid #ff9900;font-size: 25px;display: inline-block;cursor: pointer;margin: 20px 20px 20px 20px;}
		.btn:hover{background-color: #ff9900;color: white;}
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
<div style="margin-top: 5%;">

<?php
$i = 0;
echo 'WWW stands for? <br>';
echo 'Your Answer: '.$_POST["que1"];
if ($_POST["que1"]=="World Wide Web"){echo '<br><font color="green">Correct Answer !</font>';$i++;} else{echo '<br><font color="red">Wrong Answer!</font>';}
echo '<br><br>';

echo 'The smallet box in the table is called as_______ <br>';
echo 'Your Answer: '.$_POST["que2"];
if ($_POST["que2"]=="cell"){echo '<br><font color="green">Correct Answer !</font>';$i++;} else{echo '<br><font color="red">Wrong Answer!</font>';}
echo '<br><br>';

echo 'With which of the following all formulas in excel starts?<br>';
echo 'Your Answer: '.$_POST["que3"];
if ($_POST["que3"]=="="){echo '<br><font color="green">Correct Answer !</font>';$i++;} else{echo '<br><font color="red">Wrong Answer!</font>';}
echo '<br><br>';

echo 'On an excel sheet the active cell is indicated by<br>';
echo 'Your Answer: '.$_POST["que4"];
if ($_POST["que4"]=="A dark wide border "){echo '<br><font color="green">Correct Answer !</font>';$i++;} else{echo '<br><font color="red">Wrong Answer!</font>';}
echo '<br><br>';

echo 'Which of this is a web browser?<br>';
echo 'Your Answer: '.$_POST["que5"];
if ($_POST["que5"]=="Chrome"){echo '<br><font color="green">Correct Answer !</font>';$i++;} else{echo '<br><font color="red">Wrong Answer!</font>';}
echo '<br><br>';

echo '<b>Your Score: '.$i.'/5';
?>

  <?php
            $servername="localhost";
            $username="root";
            $password="";
            $dbname="kaushalya";
         
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
                 $l;
	$i =0;
	if($resultArray)
	{            		
           		 $l = $resultArray['Level'];
		 $l++;
		 $sql="update workers set Level='$l' where worker_id='$regID'";
            		if (mysqli_query($conn,$sql))
            		{ 
			echo "<script>swal('Course 1 Completed.')</script>";
			
           		 }
            		else
            		{
                			echo"Error:" .mysqli_error($conn);
            		}
	}
            
       else
{
	echo 'error'.mysqli_error($conn);;
}
            mysqli_close($conn);
    ?><br>
<a href="level2.php"><button class="btn"> Next Course </button></a>
</body>
</html>


